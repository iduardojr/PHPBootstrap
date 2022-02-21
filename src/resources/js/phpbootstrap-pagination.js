(function($) {
	
	/* PAGER CLASS DEFINITION
	 * ====================== */
	var Pager = {
		
		page: function( page ) {
			var $throw = $('.current-change a', this.element).clone(true),
				href = $throw.attr('href'),
				total = $('.total', this.element).val();
			
			page = page == undefined || page == '' ? 0 : parseInt(page);
			if ( page < 1 ) {
				page = 1;
			}
			if ( page > total ){
				page = total;
			}
			
			$throw.attr('href', href.replace(/#CURRENT#/, page));
			this.element.append($throw);
			$throw.trigger('throw');
			$throw.remove();
			$('.current', this.element).val(page);
			$('.page-first,.page-prev', this.element)[page == 1 ? 'addClass' : 'removeClass']('disabled');
			$('.page-next,.page-last', this.element)[page == total ? 'addClass' : 'removeClass']('disabled');
		} 
	};
	
	/* PAGER PLUGIN DEFINITION
	 * ======================= */
	$.plugin('pager', Pager);
	
	/* PAGER DATA-API
	* ============== */
	$('body').on('change.pagination.data-api', '.pager-bar .current', function( e ) {
		var $this = $(e.currentTarget);
		$this.parents('.pager-bar').pager('page', $this.val());
	});
	
}(jQuery));