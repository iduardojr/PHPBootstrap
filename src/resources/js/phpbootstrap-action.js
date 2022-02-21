(function($) {
	
	/* DEFAULT CLASS DEFINITION
	 * ====================== */
	var Default = function( options ){
		$.extend(this.options, options);
	};
	
	Default.prototype = {
		options: {},
		
		toggle: function() {
			if ( this.options.remote) {
				window.location = this.options.remote;
			}
		}
	};
	
	/* WINDOWS CLASS DEFINITION
	 * ====================== */
	var WINDOWS_LAST_ID = 0;
	var Windows = function( options ){
		this.options = $.extend({}, $.fn.action.defaults, options);
		WINDOWS_LAST_ID++;
		this.guid = WINDOWS_LAST_ID;
	};
	
	Windows.prototype = {
		guid: 0,
		options: null, 	
		target: null,
		
		toggle: function() {
			this.open();
		},
		
		open: function() {
			if ( this.options.features ) {
				this.target = window.open(this.options.remote, 'WINDOWS_' + this.guid, this.options.features);
			} else {
				this.target = window.open(this.options.remote, '_blank');
			}
		},
		
		close: function() {
			if ( this.target ) {
				this.target.close();
				this.target = null;
			}
		}
		
	};
	
	/* AJAX CLASS DEFINITION
	 * ======================= */
	var Ajax = function( options ){
		this.options = $.extend({}, $.fn.action.defaults, options);
	};
	
	Ajax.prototype = {
		options: null,
		request: null,
		
		toggle: function() {
			this.abort();
			if ( $.isFunction(this.options.send) ) {
				if ( this.options.send.call(this) === false ) {
					
				}
			}
			this.request = $.ajax( {
				url: this.options.remote, 
				success: $.proxy( function( data, textStatus, jqXHR) {
					if ( $.isFunction(this.options.execute) ) {
						this.options.execute.apply(this, arguments);
					}
					if ( $.isFunction(this.options.sent) ) {
						this.options.sent.call(this);
					}
				}, this ),
				dataType: this.options.response
			});
		},
	
		abort: function() {
			if ( this.request ) {
				this.request.abort();
				if ( $.isFunction(this.options.sent) ) {
					this.options.sent.call(this);
				}
			}
		}
		
	};
	
	/* STORAGE CLASS DEFINITION
	 * ======================= */
	var Storage = function( options ){
		this.options = $.extend({}, $.fn.action.defaults, options);
	};
	
	Storage.prototype = {
		options: null,
		
		toggle: function() {
			if ( $.isFunction(this.options.send) ) {
				this.options.send.call(this);
			}
			if ( $.isFunction(this.options.execute) ) {
				this.options.execute.call(this, this.options.storage);
			}
			if ( $.isFunction(this.options.sent) ) {
				this.options.sent.call(this);
			}
		}
		
	};
	
	/* ACTION PLUGIN DEFINITION
	 * ======================= */
	var Action = {
			
		Html: 'html',
		Json: 'json',
		Text: 'text',
		
		strategy: null,
		
		_fn: function( fn, args ) {
			switch ( fn ) {
				case 'toggle':
				case 'option':
				case 'widget':
					return this[fn].apply( this, args );
					break;
				default:
					return this.strategy[fn].apply( this.strategy, args );
					break;
					
			}
		},
		
		toggle: function() {
			if ( ! this.options.disabled ) {
				this.strategy.toggle();
			}
		},
		
		_setOption: function( key, value ) {
			this.options[key] = value;
			switch ( key ) {
				case 'execute':
				case 'before':
				case 'after':
					break;
				case 'ajax':
				case 'target':
				case 'storage': 
					var options = $.extend({}, this.options, {
						execute: $.proxy( function( data, textStatus, jqXHR ) {
							this._trigger('execute', this, data, textStatus, jqXHR );
						}, this),
						send: $.proxy( function() {
							this._trigger('send', this);
						}, this),
						sent: $.proxy(function() {
							this._trigger('sent', this);
						}, this)
					});
					if ( this.options.ajax ) {
						this.strategy = new Ajax(options);
					} else if ( this.options.target ){
						this.strategy = new Windows(options);
					} else if ( this.options.storage ) {
						this.strategy = new Storage(options);
					} else {
						this.strategy = new Default(options);
					}
					break;
				default:
					if ( this.strategy ) {
						this.strategy.options[key] = value;
					}
					break;
			}
		}
		
	};
	
	/* ACTION PLUGIN DEFINITION
	 * ======================= */
	$.plugin('action', Action, {
		remote: '',
		target: '',
		features: '',
		disabled: false,
		ajax: false, 
		response: 'html',
		send: null,
		execute: function( e, ui, data, textStatus, jqXHR ){
			if ( ui.options.response == ui.Json) {
				$.each( data, function( key, value ) {
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
			} else {
				if ( ui.options.target ) {
					var event = $.Event('update');
					$(ui.options.target).trigger(event, data);
					if ( ! event.isDefaultPrevented() ) {
						if ( ui.options.response == ui.Text ){
							$(ui.options.target).html(data);
						} else if ( ui.options.response == ui.Html ){
							$(ui.options.target).replaceWith(data);
						}
					}
				}
			}
		},
		sent: null
	});
	
	/* ACTION DATA-API
	* ============== */
	var event = function ( e ) {
		var $this = $(e.currentTarget), 
		options = $.extend({response: 'json'}, $this.data());
	
		options.remote = $this.attr('href');
		options.disabled = $this.closest('.disabled,:disabled').size() > 0;
		options.ajax = false;
		
		if ( $this.attr('target') ) {
			if ( $this.attr('target') == '_blank' ) {
				options.target = '_blank';
				options.features = $this.data('features');
			} else {
				options.ajax = true;
				options.response = $this.data('response');
				options.target = '#' + $this.attr('target');
			}
		} else {
			delete options.target;
		}
		$this.action('option', options);
		
		$this.action('toggle');
		return false;
	};
	
	$('body').on('click.action.data-api', 'a:not([href^=#],[data-toggle]),a[data-storage]', event);
	$('body').on('toggle.action.data-api', 'a:not([href^=#]),a[data-storage]', event);
	
}(jQuery));