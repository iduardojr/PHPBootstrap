(function($) {
	
	/* SEARCH CLASS DEFINITION
	 * ========================= */
	Search = {
			
		request: null,
		query: null,
		output: null,
		response: null,
		
		_create: function() {
			this.output = this.options.output ? $('.modal-body', this.options.output) : null;
		},
		
		abort: function(){
			if ( this.request ) {
				this.request.abort();
				this.request = null;
				this.response = null;
				this._trigger('loaded', this);
			}
		},
		
		lookup: function() {
			var query = this.options.query ? $(this.options.query).filter(':not([readonly])').val() : '';
			//if ( this.query != query || this.response == null ) {
				this.abort();
				this.query = query;
				if ( this.options.remote ) {
					this._trigger('loading', this);
					this.request = $.get( this.options.remote, { 'query': this.query }, $.proxy( function( result ) {
						this.request = null;
						this.response = result;
						this._trigger('process', this);
						this._trigger('loaded', this);
					}, this));
				}
			//} else {
			//	this._trigger('process', this);
			//}
		}
	};
	
	/* SEARCH PLUGINS DEFINITION
	 * ======================= */
	$.plugin('search', Search, {
		loading: function ( e, ui ) {
			$(ui.options.query).addClass('loading');
		},
		loaded: function( e, ui ) {
			$(ui.options.query).removeClass('loading');
		}, 
		process: function ( e, ui ) {
			if ( ui.output ) {
				ui.output.empty();
				ui.output.append(ui.response);
				ui.output.closest('.modal')
						 	  .modal('show')
       	   		  		 	  .one('hide', $.proxy( function () { ui.element.focus(); }, this ));
			} else {
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