(function($) {
	
	/* FORM CLASS DEFINITION
	 * ====================== */
	var Form = {
		
		request: null,
		
		_create: function () {
			this.element.validate({
				errorClass: 'error',
				showErrors: $.proxy( function() { 
					var validator = this.element.validate(); 
					this.error(validator.errorList, validator.successList); 
				}, this)
			});
		},
		
		load: function( url ) {
			this.abort();
			this._trigger('loading', this);
			this.request = $.getJSON(url, $.proxy(function( data ) {
				this.request = null;
				this.refresh(data);
				this._trigger('loaded', {'ui': this, 'response': data});
			}, this));
		},
		
		abort: function(){
			if ( this.request ) {
				this.request.abort();
				this.request = null;
				this._trigger('loaded', { 'ui': this });
			}
		},
		
		refresh: function( data ) {
			$.each(data, function(key, value) {
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
		},
		
		elements: function ( selector ) {
			var elements = $('[form=' + this.element.attr('name') + ']');
			if ( arguments.length < 0 ) {
				selector = '[data-control]';
			}
			if ( selector ) {
				elements = elements.closest(selector);
			}
			return elements;
		},
		
		clear: function( selector ) {
			this.elements( selector ).each( function ( i, el ) {
				$(el).field('value', '');
			});
		},
		
		reset: function( selector ) {
			this.elements( selector ).each(function ( i, el ) {
				$(el).field('reset');
			});
		},
		
		isAjax: function() {
			return this.options.ajax;
		},
		
		submit: function( isValid ) {
			isValid = isValid == undefined ? true : isValid;
			if ( isValid && ! this.valid() ) {
				return false;
			}
			if ( ! this._trigger('send', this) ) {
				return false;
			}
			var form = $('<form class="hide">').attr('action', this.element.prop('action'))
											   .attr('method', this.element.prop('method'))
											   .attr('enctype', this.element.prop('enctype'))
											   .appendTo('body');
			
			form.append(this.elements(':not(:button, :disabled)')
							.clone()
							.removeAttr('form')
							.removeAttr('id'));
			
			if ( this.isAjax() ) {
				this.abort();
				form.ajaxSubmit({
					dataType: this.options.format,
					success: $.proxy( function( response ) {
						this._trigger('success', response);
					}, this)
				});
				this.request = form.data('jqxhr');
			} else {
				form.submit();
			}
			form.remove();
			return true;
		},
		
		data: function () {
			var data = {};
			this.elements().each(function ( i, el ) {
				data[ $(el).attr('id') ] = $(el).field('value');
			});
			return data;
		}, 
		
		valid: function() {
			return this.element.valid();
		},
		
		error: function ( errors, valids ) {
			if ( errors.length ) {
				this._trigger('error', {'list': errors, 'ui': this});
			}
			if ( valids.length ){
				this._trigger('valid', {'list': valids, 'ui': this});
			}
		}
	};
	
	/* FORM PLUGIN DEFINITION
	 * ======================= */
	$.plugin('form', Form, { 
		ajax: false,
		format: 'html'
	});
	
   /* FORM DATA-API
	* ============== */
	$(function () {
		$.validator.prototype.elements = function() {
			var validator = this,
				rulesCache = {},
				elements;
				elements = $(this.currentForm).form('elements', ':not(:button, :disabled)')
											  .filter(function() {
													if ( this.name in rulesCache || !validator.objectLength($(this).rules()) ) {
														return false;
													}
													rulesCache[this.name] = true;
													return true;
												});
				return elements;
		};
		
		$.validator.prototype.customMetaMessage = function(element, method) {
			var data = $.validator.metadataRules(element);
			if ( data && data.messages && data.messages[method] ) {
				return data.messages[method];
			}
			return undefined;
		},
		
		$.validator.prototype.findByName = function( name ) {
			return $(this.currentForm).form('elements', '[name="' + name + '"]');
		};

		$.validator.metadataRules = function( element ) {
			return $(element).data( 'validate' ); 
		};
		
		$.validator.staticRules = function( element ) {
			return {};
		};
		
		$.fn.valid = function() {
			if ( $(this[0]).is('form')) {
				return this.validate().form();
			} else {
				var valid = true;
				var validator = $('form[name=' + $(this[0]).attr('form') + ']').validate();
				this.each(function() {
					valid &= validator.element(this);
				});
				return valid;
			}
		};
		
		$('body').on('click.form.data-api', ':submit[form]', function ( e ) {
			var $this = $(e.currentTarget);

			$('form[name=' + $this.attr('form') + ']').attr('action', $this.attr('formaction'))
									   				  .form('submit', !$this.is('[formnovalidate]'));
			return false;
        });
		
		$('body').on('click.form.data-api', ':reset[form]', function ( e ) {
			$('form[name=' + $(e.currentTarget).attr('form') + ']').form('reset');
			return false;
        });
		
		$('body').on('click.form.data-api', '[data-toggle=clear][form]', function ( e ) {
			$('form[name=' + $(e.currentTarget).attr('form') + ']').form('clear');
			return false;
        });
		
	});
}(jQuery));