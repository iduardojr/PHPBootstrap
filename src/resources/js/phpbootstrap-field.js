(function($) {
	
	/* DEFAULT CLASS DEFINITION
	 * ====================== */
	var Default = {
		
		create: function( element ) {
			
		},
	
		set: function ( element, value ) {
			element[element.is(':input') ? 'val' : 'html'](value);
		},
		
		get: function( element ) {
			return element[element.is(':input') ? 'val' : 'html']();
		},
		
		disable: function ( element ) {
			element[element.is(':input') ? 'attr' : 'addClass']('disabled', 'disabled');
		},
		
		enable: function( element ) {
			element[element.is(':input') ? 'removeAttr' : 'removeClass']('disabled');
		},
		
		defaultValue: function( element ) {
			return element[0].defaultValue;
		}
	};
	
	/* ENTRY CLASS DEFINITION
	 * ====================== */
	var Entry = $.extend({}, Default, {
		
		disable: function ( element ) {
			if ( element.closest('.input-prepend,.input-append').size() ) {
				element.siblings('.btn').each(function(i, item){
					$(item)[$(item).is('a') ? 'addClass' : 'attr']('disabled', 'disabled');
				});
			}
			element.attr('disabled', 'disabled');
		},
		
		enable: function( element ) {
			if ( element.closest('.input-prepend,.input-append').size() ) {
				element.siblings('.btn').each(function(i, item){
					$(item)[$(item).is('a') ? 'removeClass' : 'removeAttr']('disabled');
				});
			}
			element.removeAttr('disabled');
		}
	});
	
	/* RICH TEXT CLASS DEFINITION
	 * ====================== */
	var RichText = $.extend({}, Default, {
		
		create: function( element ) {
			element.fck({
				width: element.innerWidth(),
				height: element.innerHeight(),
				toolbar: element.attr('data-richtext-type')
			});
			var loaded = false;
			var interval = setInterval( $.proxy( function() {
				var instance = this.instance(element);
				if ( loaded ) {
					element.data('stateButton', instance.EditorWindow.parent.FCKToolbarButton.prototype.RefreshState);
					element.data('stateSpecialCombo', instance.EditorWindow.parent.FCKToolbarSpecialCombo.prototype.RefreshState);
					if ( element.is(':disabled,[readonly]') ) {
						this.disable(element);
					}
					clearInterval(interval);
				}
				if ( instance ) {
					loaded = true;
				}
			}, this), 500);
		},
		
		instance: function( element ){
			try {
				return FCKeditorAPI.GetInstance(element.attr('id'));	
			} catch ( e ){
				return null;
			}
			
		},
		
		set: function( element, value ){
			element.val(value);
			this.instance(element).SetData(value);
		},
		
		get: function( element ){
			return this.instance(element).GetXHTML(true);
		},
		
		disable: function ( element ) {
			element.attr('disabled', 'disabled');
			
			// Disabled Area
			this.instance(element).EditorDocument.body.disabled = true;
			this.instance(element).EditorDocument.designMode = "off";
			
			// Disabled Toolbar
			this.instance(element).EditorWindow.parent.FCK.ToolbarSet.Disable();
			this.instance(element).EditorWindow.parent.FCKToolbarButton.prototype.RefreshState = function(){return false;};
			this.instance(element).EditorWindow.parent.FCKToolbarSpecialCombo.prototype.RefreshState = function(){return false;};
			
			// Update
			this.instance(element).EditorWindow.parent.FCK.ToolbarSet.RefreshModeState();
		},
		
		enable: function ( element ) {
			element.removeAttr('disabled');
			
			// Enabled Area
			this.instance(element).EditorDocument.body.disabled = false;
			this.instance(element).EditorDocument.designMode = "on";
			
			// Enabled Toolbar
			this.instance(element).EditorWindow.parent.FCK.ToolbarSet.Enable();
			this.instance(element).EditorWindow.parent.FCKToolbarButton.prototype.RefreshState = element.data('stateButton');
			this.instance(element).EditorWindow.parent.FCKToolbarSpecialCombo.prototype.RefreshState = element.data('stateSpecialCombo');
			
			// Update
			this.instance(element).EditorWindow.parent.FCK.ToolbarSet.RefreshModeState();
		}
	});
	
	/* CHECKABLE CLASS DEFINITION
	 * ====================== */
	var Checkable = $.extend({}, Default, {
		
		set: function ( element, value ) {
			if ( typeof value != 'boolean' ){
				value = parseInt(value) > 0 ? true : false;
			}
			element.prop('checked', value);
		},
		
		get: function ( element ) {
			return element.is(':checked');
		},
		
		disable: function ( element ) {
			element.attr('disabled', 'disabled')
				   .parent()
				   .addClass('disabled');
		},
		
		enable: function ( element ) {
			element.removeAttr('disabled')
			   	   .parent()
			   	   .removeClass('disabled');
		},
		
		defaultValue: function( element ) {
			return element[0].defaultChecked;
		}
	});
	
	/* CHECKABLE LIST CLASS DEFINITION
	 * ====================== */
	var CheckableList = $.extend({}, Default, {
			
		set: function( element, value ){
			if ( typeof value != 'object' ) {
				value = [value];
			}
			element.find(':input')
				   .each( function (i, el) {
					  if ( $.inArray($(el).val(), value + '' ) >= 0 ) {
						  $(el).attr('checked', 'checked');
					  } else {
						  $(el).removeAttr('checked');
					  }
				   });
		},
		
		get: function( element ) { 
			var value = $(':checked', element).map(function(){
				return $(this).val();
			}).get();
			return element.find('.checkbox').size() > 0 ? value : value.length > 0 ? value[0] : null;
		},
		
		enable: function( element ) {
			element.find(':input').removeAttr('disabled');
		},
		
		disable: function( element ) {
			element.find(':input').attr('disabled', 'disabled');
		},
		
		defaultValue: function( element ) {
			var value = []; 
			element.find(':input').each( function(i, item) {
				if ( item.defaultChecked ) {
					value.push(item.value);
				}
			});
			return value;
		}
		
	});
	
	/* CHOSENBOX CLASS DEFINITION
	 * ====================== */
	var ChosenBox = $.extend({}, Default, {
		
		create: function ( element ) {
			element.chosen(element.data('options'));
			element.next().removeAttr('style');
		},
		
		set: function ( element, value ) {
			Default.set(element, value);
			element.trigger("chosen:updated");
		},
		
		disable: function ( element ) {
			Default.disable(element);
			element.trigger("chosen:updated");
		},
		
		enable: function( element ) {
			Default.enable(element);
			element.trigger("chosen:updated");
		},
		
		get: function ( element ) {
			var value = Default.get(element);
			return element.is('[multiple]') && ! $.isArray(value) ? [value] : value;
		}, 
		
		defaultValue: function( element ) {
			var value = []; 
			element.children().each( function(i, item) {
				if ( item.defaultSelected ) {
					value.push(item.value);
				}
			});
			return element.is('[multiple]') ? value : value.shift();
		}
	});
	
	/* LISTBOX CLASS DEFINITION
	 * ====================== */
	var ListBox = $.extend({}, Default, {
		
		get: function ( element ) {
			var value = Default.get(element);
			return ! $.isArray(value) ? [value] : value;
		}, 
		
		defaultValue: function( element ) {
			var value = []; 
			element.children().each( function(i, item) {
				if ( item.defaultSelected ) {
					value.push(item.value);
				}
			});
			return value;
		}
	});
	
	/* COMBOBOX CLASS DEFINITION
	 * ====================== */
	var ComboBox = $.extend({}, Default, {
		
		defaultValue: function( element ) {
			return ListBox.defaultValue(element).shift();
		}
	
	});
	
	/* XCOMBOBOX CLASS DEFINITION
	 * ====================== */
	var XComboBox = $.extend({}, Default, {
		
		create: function ( element ) {
			var hidden = element.find(':hidden'),
				text = element.find(':text'),
				button = element.find(':button'),
				that = this;
			
			text.typeahead($.extend({}, text.data(), {
				minLength: 0,
				matcher: function ( item ) {
					return ~item.label.toLowerCase().indexOf(this.query.toLowerCase());
				},
				sorter: function ( items ) {
					var beginswith = [],
				        caseSensitive = [],
				        caseInsensitive = [],
				        item;

					while ( item = items.shift() ) {
				    	if ( !item.label.toLowerCase().indexOf(this.query.toLowerCase()) ) {
				    		beginswith.push(item);
				    	} else if ( ~item.label.indexOf(this.query)) {
				    		caseSensitive.push(item);
				    	} else {
				    		caseInsensitive.push(item);
				    	}
					}

					return beginswith.concat(caseSensitive, caseInsensitive);
				},
				updater: function ( item ){
					that.set(element, item.value);
					return item.label;
				},
				highlighter: function ( item ) {
					var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&');
					return item.label.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
						return '<strong>' + match + '</strong>';
					});
				}
			}));
			
			button.on('click', function() {
				var icon = $('i', this);
				if ( icon.is('.icon-remove') ) {
					that.set(element, '');
				} else {
					text.focus();
					text.data('typeahead').lookup();
				}
				return false;
			});
		}, 
		
		set: function ( element, value ) {
			element.find(':hidden, :text').val('');
			element.find(':button i').removeClass('icon-remove').addClass('icon-chevron-down');
			value = value + '';
			if ( value ) {
				$.each(element.find(':text').data('source'), function ( i, item ) {
					if ( item.value == value ) {
						element.find(':hidden').val(item.value);
						element.find(':text').val(item.label);
						element.find(':button i').removeClass('icon-chevron-down').addClass('icon-remove');
						return false;
					}
				});
			}
		},
		
		get: function ( element ){
			return element.find(':hidden').val();
		},
		
		disable: function ( element ) {
			element.addClass('disabled');
			element.find(':input').attr('disabled', 'disabled');
		},
		
		enable: function ( element ) {
			element.removeClass('disabled');
			element.find(':input').removeAttr('disabled');
		},
		
		defaultValue: function( element ) {
			return element.find(':hidden')[0].defaultValue;
		}
	});
	
	/* FILE CLASS DEFINITION
	 * ====================== */
	var File = $.extend({}, Default, {
		
		set: function ( element, value ) {
			if ( ! value ) {
				this.replace(element);
			}
		},
		
		replace: function ( element ) {
			var clone = $('<input>'),
				file = element[0],
				attr, i;
			for ( i = 0; i < file.attributes.length; i++) {
				attr = file.attributes[i];
				if ( attr.nodeName != 'value' ) {
					clone.attr(attr.nodeName, attr.nodeValue);
				}
			}
			element.replaceWith(clone);
		}
	});
	
	/* XFILEBOX CLASS DEFINITION
	 * ====================== */
	var XFileBox = $.extend({}, File, {
		
		create: function( element ) {
			var button = element.find(':button'),
				text = element.find(':text'),
				that = this;
			
			button.on('click', function() {
				if ( element.is('.remove') ) {
					that.set(element);
				} else {
					element.find(':file').click();
				}
			});
			text.on('click', function( e ) {
				element.find(':file').click();
			});
			text.on('keydown', function( e ) {
				// space or enter
				if ( e.keyCode == 32 || e.keyCode == 13 ) {
					element.find(':file').click();
				}
				// tab
				return e.keyCode == 9;
			});
			element.on('change', ':file', function( e ) {
				element.find(':text').val( element.find(':file').val() );
				element.addClass('remove');
				element.find(':button').html(element.data('labelClear'));
			});
		},
		
		get: function ( element ) {
			return element.find(':file').val();
		},
		
		set: function ( element, value ) {
			if ( ! value ) {
				this.replace(element.find(':file'));
				element.find(':text').val('');
				element.find(':button').html(element.data('labelAdd'));
				element.removeClass('remove');
			}
		},
		
		disable: function ( element ) {
			element.addClass('disabled');
			element.find(':input').attr('disabled', 'disabled');
		},
		
		enable: function ( element ) {
			element.removeClass('disabled');
			element.find(':input').removeAttr('disabled');
		},
		
		defaultValue: function ( element ) {
			return element.find(':file')[0].defaultValue;
		}
	});
	
	/* FIELD CLASS DEFINITION
	 * ====================== */
	var Field = {
		
		control: null,
		
		_create: function () {
			this.element.on('change.field.data-api', $.proxy( function ( e ) {
				this._trigger('change', this );
			}, this));
			this.control = $.fn.field.controls[this.options.control || this.element.data('control') || 'Default'];
			this.control.create(this.element);
		},
		
		value: function ( value ) {
			if ( arguments.length ){
				var changed = ( value != this.control.get(this.element) );
				if ( changed ) {
					this.control.set( this.element, value);
					this.element.trigger('change');
				}
				return;
			} 
			return this.control.get(this.element);
		},
	
		disabled: function ( value ) {
			if ( arguments.length ) {
				if ( value ) {
					this.control.disable(this.element);
				} else {
					this.control.enable(this.element);
				}
				return;
			}
			return this.element.is('.disabled,:disabled');
		},
		
		get: function() {
			return this.control;
		},
		
		reset: function() {
			this.value(this.control.defaultValue(this.element));
		}
	
	};
	
	/* FIELD PLUGIN DEFINITION
	 * ======================= */
	$.plugin('field', Field);
	
	$.fn.field.controls = {
		'Default': Default,
		'Hidden': Default,
		'TextBox': Entry,
		'PasswordBox': Entry,
		'TextArea': Default,
		'RichText': RichText,
		'FileBox': File,
		'CheckBox': Checkable,
		'RadioButton': Checkable,
		'CheckBoxList': CheckableList,
		'RadioButtonList': CheckableList,
		'ComboBox': ComboBox,
		'ListBox': ListBox,
		'XComboBox': XComboBox,
		'ChosenBox': ChosenBox,
		'XFileBox': XFileBox
	};
	
   /* FIELD DATA-API
	* ============== */
	$(function () {
		$.valHooks.select.set = function(elem, value ) {
			var values = jQuery.makeArray( value );
			if ( !values.length ) {
				elem.selectedIndex = -1;
				return null;
			}
			$(elem).find("option").each(function( i, item ) {
				$(item)[$.inArray( $(item).val(), values ) >= 0 ? 'attr' : 'removeAttr']('selected', 'selected');
			});
		};
		
		$('[data-control=RichText], [data-control=ChosenBox]').field();
		
		$('body').on('focus.field.data-api', '[data-control]', function( e ) {
			var $this = $(e.currentTarget);
			if ( ! $this.data('field') ) {
				$this.field();
			}
		});
		
		$('body').on('update.field.data-api', '[data-control]', function( e, data ) {
			var $this = $(e.currentTarget);
			$this.field('value', data);
			return false;
		});
		
		$('body').on('focus.field.data-api', '[data-mask]', function( e ) {
			var $this = $(e.currentTarget);
				$this.mask($this.data('mask'));
		});
		
		$('body').on('focus.field.data-api', '[data-mask-money]', function( e ) {
			var $this = $(e.currentTarget);
			if ( ! $this.data('MaskMoney') ) {
				$this.maskMoney($this.data('mask-money'));
				$this.data('MaskMoney', true);
			}
		});
		
	});
	
}(jQuery));