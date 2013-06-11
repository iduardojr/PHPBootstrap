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