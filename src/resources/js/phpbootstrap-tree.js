(function($) {
	
	/* TREE CLASS DEFINITION
	 * ====================== */
	var Tree = {
		_create: function() {
			if ( this.options.persist ) {
				var data = $.cookie(this.options.persist),
					that = this;
				if ( data !== undefined ) {
					if ( ! $.cookie.json ) {
						data = JSON.parse(data);
					}
					$.each( data, function( node, value ) {
						node = $('li[id="' + node + '"]', that.element);
						if ( node.is('.expandable,.collapsable') ) {
							value ? that.expand(node) : that.collapse(node);
						}
					});
				}
			}
		},

		toggle: function( node ) {
			if ( node.is('.expandable') ) {
				this.expand(node);
			} else if ( node.is('.collapsable') ) {
				this.collapse(node);
			}
		},

		expand: function ( node ) {
			if ( $('ul > li', node).size() > 0 ) {
				node.removeClass('expandable');
				node.addClass('collapsable');
				this._trigger('expand', {'node': node, 'ui': this});
				this.persist();
			}
		},

		collapse: function( node ) {
			if ( $('ul > li', node).size() > 0 ) {
				node.removeClass('collapsable');
				node.addClass('expandable');
				this._trigger('collapse', {'node': node, 'ui': this});
				this.persist();
			}
		},

		persist: function() {
			if ( this.options.persist ) {
				var data = {};
				this.element.find('.expandable,.collapsable')
							.each(function( i , node ) {
								node = $(node);
								data[node.attr('id')] = node.is('.collapsable');
							});
				if ( ! $.cookie.json) {
					data = JSON.stringify(data);
				} 
				$.cookie(this.options.persist, data, this.options.cookie);
			}
		}

	};
	
	/* TREE PLUGIN DEFINITION
	 * ======================= */
	$.plugin('tree', Tree, {
		persist: false,
		cookie: {} 
	});
	
   /* TREE DATA-API
	* ============== */
	$(function () {
		$('body').on('click.tree.data-api', '[data-toggle=tree]', function ( e ) {
			var $this = $(e.currentTarget),
				node = $this.data('target') ? $($this.data('target')) : $this.parents('li:first');
				tree = node.closest('.tree');
				tree.tree('toggle', node);
	    });
		
		$('body').on('click.tree.data-api', '[data-tree]', function ( e ) {
			var $this = $(e.currentTarget),
				tree = $($this.data('target'));
				$('li', tree).each(function (i, node) {
					tree.tree($this.data('tree'), $(node));
				});
	    });
		
	});
	
}(jQuery));