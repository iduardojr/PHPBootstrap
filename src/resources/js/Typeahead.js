(function($) {
	
	$.fn.typeahead.Constructor.prototype.select = function () {
        var val = this.$menu.find('.active').data('value');
        this.$element.val(this.updater(val))
        			 .change();
        return this.hide();
    };
    
    $.fn.typeahead.Constructor.prototype.render = function ( items ) {
		var that = this;

		items = $(items).map(function (i, item) {
			i = $(that.options.item).data('value', item);
			i.find('a').html(that.highlighter(item));
        	return i[0];
		});

		items.first().addClass('active');
		this.$menu.html(items);
		return this;
    };

   /* $.fn.typeahead.Constructor.prototype.blur = function ( event ) {
		var that = this;
		this.focused = false;
	    if (!this.mousedover && this.shown) setTimeout(function () { that.hide(); }, 200);
    };
    
    $.fn.typeahead.Constructor.prototype.mouseleave = function ( event ) {
		var that = this;
    	this.mousedover = false;
    	setTimeout(function () { if (!that.focused && that.shown) that.hide(); }, 200);
    	this.focused = false;
    };
    */
    $.fn.typeahead.Constructor.prototype.lookup = function ( event ) {
        var items;
        this.query = this.$element.val();

        if ( this.query.length < this.options.minLength ) {
        	return this.shown ? this.hide() : this;
        }
        items = $.isFunction(this.source) ? this.source(this.query, $.proxy(this.process, this)) : this.source;
        return items ? this.process(items) : this;
   };
   
}(jQuery));