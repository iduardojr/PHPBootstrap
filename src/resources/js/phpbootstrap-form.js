(function($) {
	
	/* FORM CLASS DEFINITION
	 * ====================== */
	var Form = {
		
		Text: 'text',
		Html: 'html',
		Json: 'json',
			
		request: null,
		response: null,
		invalidList: null,
		validList: null,
		
		_create: function () {
			this.element.validate({
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
				this.response = data;
				this._trigger('refresh', this);
				this._trigger('loaded', this);
			}, this));
		},
		
		abort: function(){
			if ( this.request ) {
				this.request.abort();
				this.request = null;
				this.response = null;
				this._trigger('loaded', this);
			}
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
			
			this.elements('select').each( function(i, item) {
				$(item).val($(item).val());
			});
			
			form.append(this.elements(':not(:button, :disabled)')
							.clone(true)
							.removeAttr('form')
							.removeAttr('id'));
			
			$.each( this.elements('textarea'), function( i, item ){
				$('textarea[name=' + $(item).attr('id') + ']', form).val($(item).val());
			});
			
			if ( this.isAjax() ) {
				this.abort();
				form.ajaxSubmit({
					dataType: this.options.format,
					success: $.proxy( function( data ) {
						this.request = null;
						this.response = data;
						this._trigger('success', this);
						this._trigger('sent', this);
						this.response = null;
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
		
		valid: function( element ) {
			if ( element == undefined ) {
				return this.element.valid();
			}
			return element.valid();
		},
		
		error: function ( invalidList, validList ) {
			this.invalidList = invalidList;
			this.validList = validList;
			if ( this.invalidList.length ) {
				this._trigger('error', this);
			}
			if ( this.validList.length ){
				this._trigger('valid', this);
			}
		}
	};
	
	/* FORM PLUGIN DEFINITION
	 * ======================= */
	$.plugin('form', Form, { 
		ajax: false,
		format: 'html',
		refresh: function( e, ui ) {
			$.each(ui.response, function( key, value ) {
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
		success: function( e, ui ){
			if ( ui.options.format == ui.Json ) {
				$.each( ui.response, function( key, value ) {
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
				var event = $.Event('update');
				ui.element.trigger(event, ui.response);
				if ( ! event.isDefaultPrevented() ) {
					if ( ui.options.format == ui.Text ){
						ui.element.html(ui.response);
					} else if ( ui.options.format == ui.Html ){
						ui.element.replaceWith(ui.response);
					}
				}
			}
		}
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
				var validator = $('form[name=' + $(this[0]).attr('form') + ']').form().validate();
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