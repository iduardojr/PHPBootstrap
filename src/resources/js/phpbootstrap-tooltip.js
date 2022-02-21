(function($) {
	
	/* TOOLTIP DATA-API
	* ============== */
	$('body').on('mouseenter.tooltip.data-api, mouseleave.tooltip.data-api', '[rel=tooltip],[rel=popover]', function( e ) {
		var $this = $(e.currentTarget), 
			type = $this.attr('rel'),
			widget = $this.data(type);
		
		if (! widget ) {
			$this[type]({trigger: 'manual'});
			widget = $this.data(type);
		} 
		widget[e.type == 'mouseenter' ? 'enter' : 'leave'](e);
		return false;
	});
	
}(jQuery));