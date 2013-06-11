(function($) {
	
	/* CORE CLASS DEFINITION
	 * ====================== */
	Core = {
		name: '',
		options: {},
		element: null,
		
		_constructor: function( element, options ) {
			this.element = $(element);
			this.options = $.extend( true, {}, this.options, this.element.data(), options );
			this._create();
			this._trigger("create");
		},
		
		_create: function() {
			
		},
		
		_trigger: function( type, data ) {
			var callback = this.options[type],
				event = $.Event(type + this.name),
				args = $.merge([event], Array.prototype.slice.call( arguments, 1 ));
			
			this.element.trigger( event, data );
			
			return !( $.isFunction(callback) &&
				callback.apply(this.element[0], args) === false ||
				event.isDefaultPrevented() );
		},
		
		_setOption: function(key, value) {
			this.options[key] = value;
		},

		widget: function() {
			return this.element;
		},
		
		_fn: function( fn, args ) {
			return this[fn].apply( this, args );
		},
		
		option: function( key, value ) {
			if ( arguments.length === 0 ) {
				return this.options;
			}
			if  (typeof key === "string" ) {
				if ( value === undefined ) {
					return this.options[ key ];
				}
				this._setOption(key, value);
			} else {
				$.each( key, $.proxy(function (i, v) {
					this._setOption(i, v);
				}, this));
			}
			return this;
		}
	};
	
	
	// CREATE PLUGINS
	$.plugin = function( name, object, subclass, defaults ) {
		
		if ( arguments.length <= 3 ) {
			defaults = subclass;
			subclass = {};
		} 
		
		var plugin = function( element, options ) {
			this._constructor(element, options);
		};
		plugin.prototype = $.extend(true, {}, Core, subclass, object);
		
		$.fn[name] = function ( option ) {
			
			var isMethodCall = typeof option === 'string',
				returnValue = this,
				args = Array.prototype.slice.call( arguments, 1 ),
				options = $.extend({}, $.fn[name].defaults, typeof option == 'object' && option);
			
			if ( !isMethodCall || ( isMethodCall && option.charAt( 0 ) != "_") ) {
				
				this.each(function () {
					var widget = $(this).data(name),
						methodValue = widget;
					
				    if ( !widget ) {
				    	widget = new plugin(this, options);
				    	widget.name = name.toLowerCase();
				    	$(this).data(name, widget);
				    }
				    
				    if ( isMethodCall ) {
				    	methodValue = widget._fn(option, args);
				    } 
				    
				    if ( methodValue !== widget && methodValue !== undefined ) {
				    	returnValue = methodValue;
				    	return false;
				    }
				    
				});
			}
			
			return returnValue;
		};
		
		$.fn[name].constructor = plugin;
		$.fn[name].defaults = defaults || {};
	};
}(jQuery));