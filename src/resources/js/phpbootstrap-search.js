(function($) {
	
	/* SEARCH CLASS DEFINITION
	 * ========================= */
	Search = {
			
		request: null,
		query: null,
		output: null,
		
		_create: function() {
			this.output = this.options.output ? $('.modal-body', this.options.output) : null;
		},
		
		abort: function(){
			if ( this.request ) {
				this.request.abort();
				this.request = null;
				this._trigger('loaded', { ui: this, response: {} });
			}
		},
		
		lookup: function() {
			this.abort();
			this.query = this.options.query ? $(this.options.query).filter(':not([readonly])').val() : '';
			if ( this.options.remote ) {
				this._trigger('loading', this);
				this.request = $.get( this.options.remote, { 'query': this.query }, $.proxy( function( result ) {
					this.request = null;
					this._trigger('process', { ui: this, response: result });
					this._trigger('loaded', { ui: this, response: result });
				}, this));
			}
		}
		
	};
	
	/* SEARCH PLUGINS DEFINITION
	 * ======================= */
	$.plugin('search', Search, {
		loading: function ( e, ui ) {
			$(ui.options.query).addClass('loading');
		},
		loaded: function( e, data ) {
			$(data.ui.options.query).removeClass('loading');
		}, 
		process: function ( e, data ) {
			if ( data.ui.output ) {
				data.ui.output.empty();
				data.ui.output.append(data.response);
				data.ui.output.closest('.modal')
						 	  .modal('show')
       	   		  		 	  .one('hide', $.proxy( function () { data.ui.element.focus(); }, this ));
			} else {
				$.each( data.response.data, function( key, value ) {
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
		}
	});
	
   /* DATA-API
	* ============== */
	$(function () {
		
		$('body').on('click.search.data-api', '[data-toggle=search]', function( e ) {
			var $this = $(e.currentTarget);
			if ( ! $this.data('search') ) {
				$this.search($this.data());
			};
			$this.search('lookup');
			return false;
		});
		
	});
	
}(jQuery));