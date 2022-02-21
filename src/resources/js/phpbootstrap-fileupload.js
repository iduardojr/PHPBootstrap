(function($) {
	
	/* FILE UPLOAD CLASS DEFINITION
	 * ====================== */
	FileUpload = {
		form: null,
		
		_create: function () {
			this.form = $('<form id="' + this.options.identify + '" method="post" class="hide" action="' + this.options.remote + '">'
				     	+ '<input type="file" name="' + this.options.identify + '" autocomplete="off">'
				     	+ '</form>');
			this.element.after(this.form);
			this.form.on('change', ':file', $.proxy( function ( e ) {
				this.select();
			}, this));
		},
		
		open: function() {
			this.form.find(':file').click();
		},
		
		select: function() {
			this.form.submit();
		}
	
	};
	
	/* FILE UPLOAD PLUGIN DEFINITION
	 * ======================= */
	$.plugin('upload', FileUpload);
	
	/* FILE UPLOAD DATA-API
	* ============== */
	$(function () {
		$('body').on('click.upload.data-api', '[data-toggle=fileupload]', function( e ) {
			var $this = $(e.currentTarget);
			$this.upload('open');
			return false;
		});
	});
	
}(jQuery));