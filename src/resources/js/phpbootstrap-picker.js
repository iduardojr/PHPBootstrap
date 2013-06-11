(function($) {
	
	$.fn.datepicker.Constructor.prototype.setValue = function() {
		var formatted = this.getFormattedDate();
		if (!this.isInput) {
			if (this.component){
				this.element.find('input').val(formatted);
			}
			if ( this.element.data('target') ) {
				$(this.element.data('target')).field('value', formatted);
			} else {
				this.element.data('date', formatted);
			}
		} else {
			this.element.val(formatted);
		}
	};
	
	$.fn.datepicker.Constructor.prototype.update = function(){
		var date, fromArgs = false;
		if(arguments && arguments.length && (typeof arguments[0] === 'string' || arguments[0] instanceof Date)) {
			date = arguments[0];
			fromArgs = true;
		} else {
			if ( this.isInput ) {
				date = this.element.val();
			} else {
				if ( this.element.data('target') ) {
					date = $(this.element.data('target')).field('value');
				} else {
					date = this.element.data('date') || this.element.find('input').val();
				}
			}
		}

		this.date = $.fn.datepicker.DPGlobal.parseDate(date, this.format, this.language);

		if(fromArgs) this.setValue();

		if (this.date < this.startDate) {
			this.viewDate = new Date(this.startDate);
		} else if (this.date > this.endDate) {
			this.viewDate = new Date(this.endDate);
		} else {
			this.viewDate = new Date(this.date);
		}
		this.fill();
	},
	
	$.fn.timepicker.Constructor.prototype._init = function() {
	      var self = this;
	      
	      if ( this.$element.is(':text') ){
	          this.$element.on({
	            'focus.timepicker': $.proxy(this.highlightUnit, this),
	            'click.timepicker': $.proxy(this.showWidget, this),
	            'keydown.timepicker': $.proxy(this.elementKeydown, this),
	          });
	      } else {
	    	  this.$element.on({
	            'click.timepicker': $.proxy(this.showWidget, this),
	          });
	      }

	      if (this.template !== false) {
	        this.$widget = $(this.getTemplate()).appendTo('body').on('click', $.proxy(this.widgetClick, this));
	      } else {
	        this.$widget = false;
	      }

	      if (this.showInputs && this.$widget !== false) {
	          this.$widget.find('input').each(function() {
	            $(this).on({
	              'click.timepicker': function() { $(this).select(); },
	              'keydown.timepicker': $.proxy(self.widgetKeydown, self)
	            });
	          });
	      }

	      this.setDefaultTime(this.defaultTime);
	};
	
	$.fn.timepicker.Constructor.prototype.showWidget = function() {
		if (this.isOpen) {
			return;
        }

        var self = this;
        $(document).on('mousedown.timepicker', function (e) {
          // Clicked outside the timepicker, hide it
          if ($(e.target).closest('.bootstrap-timepicker-widget').length === 0) {
            self.hideWidget();
          }
        });

        this.$element.trigger({
          'type': 'show.timepicker',
          'time': {
              'value': this.getTime(),
              'hours': this.hour,
              'minutes': this.minute,
              'seconds': this.second,
              'meridian': this.meridian
           }
        });

        this.updateFromElementVal();

        if (this.template === 'modal') {
        	this.$widget.modal('show').on('hidden', $.proxy(this.hideWidget, this));
        } else {
        	  if (this.isOpen === false) {
        		  var zIndex = parseInt(this.$element.parents().filter(function() {
    								return $(this).css('z-index') != 'auto';
    							}).first().css('z-index'))+10;
        		  var offset = this.$element.offset();
        		  var height = this.$element.outerHeight(true);
        		  this.$widget.css({
        			  top: offset.top + height,
        			  left: offset.left,
        			  zIndex: zIndex,
        			  display: 'block'
        		  });
        	  }
        }

        this.isOpen = true;
	};
	
	$.fn.timepicker.Constructor.prototype.hideWidget = function() {
		if (this.isOpen === false) {
			return;
	    }

		if (this.showInputs) {
			this.updateFromWidgetInputs();
		}

        this.$element.trigger({
	          'type': 'hide.timepicker',
	          'time': {
	              'value': this.getTime(),
	              'hours': this.hour,
	              'minutes': this.minute,
	              'seconds': this.second,
	              'meridian': this.meridian
	           }
        });

        if (this.template === 'modal') {
	         this.$widget.modal('hide');
        } else {
	         this.$widget.css('display', 'none');
        }

	    $(document).off('mousedown.timepicker');

	    this.isOpen = false;
	};
	
	$.fn.timepicker.Constructor.prototype.updateElement = function() {
		if ( this.$element.is(':text') ) {
			this.$element.val(this.getTime()).change();
		} else {
			if ( this.$element.data('target') ) {
				$(this.$element.data('target')).field('value', this.getTime());
			}
		}
	};
	
	$.fn.timepicker.Constructor.prototype.updateFromElementVal = function() {
		var val = null;
		
		if ( this.$element.is(':text') ) {
			val = this.$element.val();
		} else {
			if ( this.$element.data('target') ) {
				val = $(this.$element.data('target')).field('value');
			}
		}

		if ( val ) {
			this.setTime(val);
		}
	};
	
	$.fn.timepicker.Constructor.prototype.setDefaultTime = function( defaultTime ) {
	      if (!this.$element.val() && !this.$element.data('target') ) {
	        if (defaultTime === 'current') {
	          var dTime = new Date(),
	            hours = dTime.getHours(),
	            minutes = Math.floor(dTime.getMinutes() / this.minuteStep) * this.minuteStep,
	            seconds = Math.floor(dTime.getSeconds() / this.secondStep) * this.secondStep,
	            meridian = 'AM';

	          if (this.showMeridian) {
	            if (hours === 0) {
	              hours = 12;
	            } else if (hours >= 12) {
	              if (hours > 12) {
	                hours = hours - 12;
	              }
	              meridian = 'PM';
	            } else {
	              meridian = 'AM';
	            }
	          }

	          this.hour = hours;
	          this.minute = minutes;
	          this.second = seconds;
	          this.meridian = meridian;

	          this.update();

	        } else if (defaultTime === false) {
	          this.hour = 0;
	          this.minute = 0;
	          this.second = 0;
	          this.meridian = 'AM';
	        } else {
	          this.setTime(defaultTime);
	        }
	      } else {
	        this.updateFromElementVal();
	      }
	};
	
	$.fn.colorpicker.Constructor.prototype.update = function() {
		var val = null;
		if ( this.element.is(':text') ) {
			val = this.element.val();
		} else if ( this.element.data('target') ) {
			val = $(this.element.data('target')).field('value');
		} else {
			val = this.element.data('color');
		}
		this.setValue(val + '');
	};
	
	$.fn.colorpicker.Constructor.prototype.hide = function(){
		this.picker.hide();
		$(window).off('resize', this.place);
		if (!this.isInput) {
			$(document).off({
				'mousedown': this.hide
			});
			if ( this.element.data('target') ) {
				$(this.element.data('target')).field('value', this.format.call(this));
			}
			this.element.data('color', this.format.call(this));
		} else {
			this.element.prop('value', this.format.call(this));
		}
		this.element.trigger({
			type: 'hide',
			color: this.color
		});
	};
	
	$.fn.colorpicker.Constructor.prototype.show = function(e) {
		this.picker.show();
		this.height = this.component ? this.component.outerHeight() : this.element.outerHeight();
		this.place();
		$(window).on('resize', $.proxy(this.place, this));
		if (!this.isInput) {
			if (e) {
				e.stopPropagation();
				e.preventDefault();
			}
		}
		$(document).on({
			'mousedown': $.proxy(this.hide, this)
		});
		this.element.trigger({
			type: 'show',
			color: this.color
		});
		this.update();
	};
	
	/* DATA-API
	 * ============== */
	$(function () {
	
		$('.datepicker').each(function(i, item) {
			$(item).datepicker($(item).data('date-options'));
		});
		
		var event = function( e ) {
			var $this = $(e.currentTarget);
			if ( ! $this.data('datepicker') ) {
				$this.datepicker($this.data('date-options'));
				$this.datepicker('show');
			}
			return false;
		};
		$('body').on('click.datepicker.data-api', '[data-toggle=datepicker]', event);
		$('body').on('focus.datepicker.data-api', '[data-provide=datepicker]', event);
		
		event = function( e ) {
			var $this = $(e.currentTarget);
			if ( ! $this.data('timepicker') ) {
				$this.timepicker($this.data('time-options'));
				$this.timepicker('showWidget');
			}
			return false;
		};
		$('body').on('click.timepicker.data-api', '[data-toggle=timepicker]', event);
		$('body').on('focus.timepicker.data-api', '[data-provide=timepicker]', event);
		
		event = function( e ) {
			var $this = $(e.currentTarget);
			if ( ! $this.data('colorpicker') ) {
				$this.colorpicker();
				$this.colorpicker('show');
			}
			return false;
		};
		$('body').on('click.colorpicker.data-api', '[data-toggle=colorpicker]', event);
		$('body').on('focus.colorpicker.data-api', '[data-provide=colorpicker]', event);
	});
	
}(jQuery));