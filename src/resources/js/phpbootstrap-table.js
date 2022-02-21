(function($) {
	
	/* TABLE CLASS DEFINITION
	 * ====================== */
	var Table = {
		abstract: false,
		selected: false,
		
		select: function (){
			this.selected = true;
			this._trigger('select');
			$(':checkbox:enabled', this.element).attr('checked', 'checked');
		},
		
		unselect: function(){
			this.selected = false;
			this._trigger('unselect');
			$(':checkbox:enabled', this.element).removeAttr('checked');
		},
		
		toggle: function() {
			this.refresh();
			if ( ! this.selected ) {
				this.select();
			} else {
				this.unselect();
			}
		},
		
		refresh: function () {
			var enabled = $('tbody :checkbox:enabled', this.element).size(),
				checked = $('tbody :checkbox:checked', this.element).size();
			if ( enabled == checked ) {
				$('thead :checkbox', this.element).attr('checked', 'checked');
				this.selected = true;
			} else {
				$('thead :checkbox', this.element).removeAttr('checked');
				this.selected = false;
			}
		}
		
	};
	
	/* TABLE PLUGIN DEFINITION
	 * ======================= */
	$.plugin('table', Table);
	
   /* TABLE DATA-API
	* ============== */
	$(function () {
		$(document).on('click.table.data-api', '.table thead :checkbox', function( e ){
			var $this = $(e.currentTarget).parents('.table');
			 	$this.table('toggle');
		});
		$(document).on('click.table.data-api', '.table tbody :checkbox:enabled', function( e ){
			var $this = $(e.currentTarget).parents('.table');
				$this.table('refresh');
		});
	});
	
}(jQuery));