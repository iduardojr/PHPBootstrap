(function($) {
	
	/* SEEK CLASS DEFINITION
	 * ===================== */
	Seek = {
			
		request: null,
		
		abort: function(){
			if ( this.request ) {
				this.request.abort();
				this.request = null;
				this._trigger('loaded', this);
			}
		},
		
		search: function() {
			this.abort();
			if ( this.options.query.length > 0 && this.options.remote ) {
				this._trigger('loading', this);
				this.request = $.getJSON( this.options.remote, {'query': this.options.query }, $.proxy( function( result ) {
					this.request = null;
					this._trigger('process', { ui: this, data: result });
					this._trigger('loaded', { ui: this, data: result });
				}, this));
			}
		}
		
	};
	
	/* RESEARCH CLASS DEFINITION
	 * ========================= */
	Research = {
		
		search: function() {
			this.abort();
			if ( this.options.remote ) {
				this._trigger('loading', this);
				this.request = $.get( this.options.remote, {'query': this.options.query }, $.proxy( function( result ) {
					this.request = null;
					$('.modal-body', this.options.target).empty();
					$('.modal-body', this.options.target).append(result);
					this.options.target.modal('show')
	       	   		  		  		   .one('hide', $.proxy(function () { this.element.focus(); }, this));
					this._trigger('loaded', { ui: this, data: result });
				}, this));
			}
		}
		
	};
	
	/* OUTPUT, INPUT PLUGINS DEFINITION
	 * ======================= */
	$.plugin('xseek', Seek, {
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
	$.plugin('xresearch', Research, Seek, {});
	
   /* DATA-API
	* ============== */
	$(function () {
		
		$('body').on('click.search.data-api', '[data-toggle=seek]', function( e ) {
			var $this = $(e.currentTarget),
				input = $($this.data('input-query'));
			
			if ( ! $this.data('xseek') ) {
				$this.xseek({ remote: $this.data('remote'),
							  loading: function (e, ui ) {
								  input.addClass('loading');
							  },
							  loaded: function(e, ui) {
								  input.removeClass('loading');
							  }});
			}
			$this.xseek('option', 'query', input.field('value'));
			$this.xseek('search');
			return false;
		});
		
		$('body').on('click.search.data-api', '[data-toggle=research]', function( e ) {
			var $this = $(e.currentTarget),
				input = $($this.data('input-query'));
			
			if ( ! $this.data('xresearch') ) {
				$this.xresearch({ 
					remote: $this.data('remote'),
					target: $($this.data('target')),
					loading: function (e, ui ) {
						input.addClass('loading');
					},
					loaded: function(e, ui) {
						input.removeClass('loading');
					}
				});
			}
			$this.xresearch('option', 'query', input.is('[readonly]') ? '' : input.field('value'));
			$this.xresearch('search');
			return false;
		});
		
	});
	
}(jQuery));