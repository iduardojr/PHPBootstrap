(function($) {
	
	/* TYPEAHEAD CLASS DEFINITION
	 * ===================== */
	$.fn.typeahead.Constructor.prototype.select = function () {
        var val = this.$menu.find('.active').data('value');
        this.$element.val(this.updater(val))
        			 .change();
        return this.hide();
    };
    
    $.fn.typeahead.Constructor.prototype.render = function ( items ) {
		var that = this;

		items = $(items).map(function (i, item) {
			i = $(that.options.item).data('value', item);
			i.find('a').html(that.highlighter(item));
        	return i[0];
		});

		items.first().addClass('active');
		this.$menu.html(items);
		return this;
    };

    $.fn.typeahead.Constructor.prototype.lookup = function ( event ) {
        var items;
        this.query = this.$element.val();

        if ( this.query.length < this.options.minLength ) {
        	return this.shown ? this.hide() : this;
        }
        items = $.isFunction(this.source) ? this.source(this.query, $.proxy(this.process, this)) : this.source;
        return items ? this.process(items) : this;
   };
	
	/* SUGGEST CLASS DEFINITION
	 * ====================== */
	var Suggest = function (element, options) {
	    this.$element = $(element);
	    this.options = $.extend({}, $.fn.suggest.defaults, options);
	    this.$menu = $(this.options.menu);
	    this.shown = false;
	    this.listen();
	};
	
	Suggest.prototype = $.extend({}, $.fn.typeahead.Constructor.prototype, {
		name: 'suggest',
		timer: null,
		request: null,
	    
	    lookup: function ( event) {
	    	this.abort();
	    	this.query = this.$element.val();
	        if (!this.query || this.query.length < this.options.minLength) {
	        	return this.shown ? this.hide() : this;
	        }
	        this.timer = setTimeout( $.proxy(function() {
	        	this.request = this.connect();
	        }, this), this.options.delay );
	    },
	    
	    abort: function() {
	    	clearTimeout( this.timer );
	    	if ( this.request ) {
    			this.request.abort();
    			this.request = null;
    		}
	    },
	    
	    connect: function() {
    		this.$element.addClass('loading');
			return $.getJSON(this.options.source, { 'query': this.query, 'items': this.options.items }, $.proxy(function( data ) {
				this.request = null;
				this.process(data);
				this.$element.removeClass('loading');
			}, this));
    		
    	},
    	
    	updater: function( item ) {
    		this.trigger('select', item);
    		return typeof item == 'string' ? item : item.label;
    	},
    	
    	highlighter: function ( item ) {
    		var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&'),
    			re = new RegExp('(' + query + ')', 'ig'),
    			label = typeof item == 'string' ? item : item.label;

    	    return label.replace(re, function ( $1, match ) {
    	    	return '<strong>' + match + '</strong>';
    	    });
    	},
    	
    	matcher: function ( item ) {
    		var label = typeof item == 'string' ? item : item.label;
    	   	return ~label.toLowerCase().indexOf(this.query.toLowerCase());
    	},
    	
    	sorter: function ( items ) {
    		var beginswith = [],
	        	caseSensitive = [],
	        	caseInsensitive = [],
	        	item, label;

    		 while ( item = items.shift() ) {
    			
    			label = typeof item == 'string' ? item : item.label;

    			if ( ! label.toLowerCase().indexOf(this.query.toLowerCase()) ) {
    				beginswith.push(item);
    			} else if (~label.indexOf(this.query)) {
    				caseSensitive.push(item);
    			} else {
    				caseInsensitive.push(item);
    			};
    			
    		}

    		return beginswith.concat(caseSensitive, caseInsensitive);
	    },
    	
    	trigger: function( type, data ) {
			var callback = this.options[type],
				event = $.Event(type + this.name),
				args = $.merge([event], Array.prototype.slice.call( arguments, 1 ));
			
			this.$element.trigger( event, data );
			
			return !( $.isFunction(callback) &&
				callback.apply(this.$element[0], args) === false ||
				event.isDefaultPrevented() );
		}
	});
	
	/* SEEK CLASS DEFINITION
	 * ===================== */
	Seek = {
			
		request: null,
		query: null,
		
		_create: function() {
			this.element.on('blur', $.proxy(this.lookup, this));
			this.element.on('focus', $.proxy(this.abort, this));
		},
		
		abort: function(){
			if ( this.request ) {
				this.request.abort();
				this.request = null;
				this._trigger('loaded', { ui: this, data: {} });
			}
		},
		
		lookup: function() {
			if ( this.query != this.element.val() ) {
				this.query = this.element.val();
				this.abort();
				if ( this.options.remote ) {
					this._trigger('loading', this);
					this.request = $.getJSON( this.options.remote, {'query': this.query }, $.proxy( function( result ) {
						this.request = null;
						this._trigger('process', { ui: this, data: result });
						this._trigger('loaded', { ui: this, data: result });
					}, this));
				}
			}
		}
		
	};
	
	
	/* SUGGEST, SEEK PLUGINS DEFINITION
	 * ======================= */
	
	$.fn.suggest = function ( option ) {
		return this.each(function () {
			var $this = $(this),
				data = $this.data('suggest'),
		        options = typeof option == 'object' && option;
			
		      if ( ! data )  {
		    	  $this.data('suggest', (data = new Suggest(this, options)));
		      }
		      if ( typeof option == 'string' ) {
		    	  data[option]();
		      };
		 });
	};

	$.fn.suggest.defaults = $.extend({}, $.fn.typeahead.defaults, { 
		source: '', 
		delay: 300, 
		select: function( e, data, $this ) {
			if ( $.isPlainObject(data) && $.isPlainObject(data.value) ) {
				$.each( data.value, function( key, value ) {
					var el = $('#' + key );
					var event = $.Event('update');
					el.trigger(event, value, $this);
					if ( ! event.isDefaultPrevented() ) {
						if ( el.is(':input,label,fieldset') ) {
							el.val(value);
						} else {
							el.html(value);
						}
					}
				});
			}
		}
	});
	$.fn.suggest.Constructor = Suggest;
	
	
	$.plugin('seek', Seek, {
		loading: function ( e, ui ) {
			ui.element.addClass('loading');
		},
	    loaded: function( e, data ) {
			data.ui.element.removeClass('loading');
		},
		process: function ( e, response ) {
			$.each( response.data, function( key, value ) {
				var el = $('#' + key );
				var event = $.Event('update');
				el.trigger(event, value);
				if ( ! event.isDefaultPrevented() ) {
					if ( el.is(':input') ) {
						el.val(value);
					} else {
						el.html(value);
					};
				};
			});
		}
	});
	
   /* SUGGEST, SEEK DATA-API
	* ============== */
	$(function () {
		
		$('body').on('focus.seek.data-api', '[data-provide=seek]', function( e ) {
			var $this = $(e.currentTarget);
			if ($this.data('seek')) return;
		    e.preventDefault();
		    $this.seek($this.data());
		});
		
		$('body').on('focus.suggest.data-api', '[data-provide=suggest]', function ( e ) {
			var $this = $(e.currentTarget);
			if ($this.data('suggest')) return;
		    e.preventDefault();
		    $this.suggest($this.data());
		});
		
	});
}(jQuery));