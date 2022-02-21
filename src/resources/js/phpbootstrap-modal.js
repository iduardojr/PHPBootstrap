(function($) {
	
	$(document).on('click.modal.data-api', '[data-toggle="modal-open"]', function (e) {
		var $this = $(e.currentTarget),
	      	$target = $($this.attr('data-target'));
		
	    $target.data('subject', $this)
	    	   .modal('toggle')
		       .one('hide', function () { $this.focus(); });
	    
	    return false;
	});
	
	$(document).on('click.modal.data-api', '[data-toggle="modal-load"]', function (e) {
		var $this = $(e.currentTarget),
			options = {};
		
		options.remote = $this.attr('href');
		options.disabled = $this.closest('.disabled,:disabled').size() > 0;
		options.ajax = true;
		options.response = $this.data('response');
		options.target = '#' + $this.attr('target');
		options.execute = function( event, widget, data ) {
			var event = $.Event('update'),
				$target = $(widget.options.target);
			$target.trigger(event, data, $this);
			if ( ! event.isDefaultPrevented() ) {
				if ( widget.options.response == 'html' ){
					$('.modal-body', $target).html(data);
				} else {
					$.each( data, function( key, value ) {
						var el = $('#' + key );
						var event = $.Event('update');
						el.trigger(event, value, $this);
						if ( ! event.isDefaultPrevented() ) {
							if ( el.is(':input') ) {
								el.val(value);
							} else {
								el.html(value);
							}
						}
					});
				}
			}
			
			$target.modal('show')
    	       	   .one('hide', function () { $this.focus(); });
		};
		$this.action('option', options);
		$this.action('toggle');
	    return false;
	});
	
	$(document).on('click.modal.data-api', '[data-dismiss="confirm"]', function () {
		var $this = $(this),
	      	$target = $($this.closest('.modal'));
	  
		if ( $target.data('subject') ) {
			$target.data('subject').trigger('toggle');
			$target.removeData('subject');
		}
	    $target.modal('hide');
	    
	    return false;
	});
	
}(jQuery));