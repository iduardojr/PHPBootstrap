(function($) {
	
	/* TREE CLASS DEFINITION
	 * ====================== */
	var Tree = {
		history: {},
		_create: function() {
			if ( this.options.persist ) {
				var history = $.cookie(this.options.persist);
				if ( history !== undefined ) {
					if ( ! $.cookie.json ) {
						history = JSON.parse(history);
					}
					this._reset(history);
				}
			}
		},
		
		_reset: function( history ) {
			var that = this;
			this.history = {};
			$.each(history, function( identify, value ) {
				var node = $('li[id="' + identify + '"]', that.element);
				if ( node.is('li.expandable,li.collapsable') ) {
					value ? that.expand(node) : that.collapse(node);
				} else {
					that.history[identify] = value;
				}
			});
		}, 

		toggle: function( node, isAll ) {
			if ( node.is('.expandable') ) {
				this.expand(node, isAll);
			} else if ( node.is('.collapsable') ) {
				this.collapse(node);
			}
		},
		
		expand: function ( node, isAll ) {
			if ( node.is('.expandable') ) {
				var hitarea = $('> .hitarea', node);
				var identify = node.attr('id');
				if ( $('ul > li', node).size() > 0 || hitarea.is(':not(a[href])') ) {
					node.removeClass('expandable');
					node.addClass('collapsable');
					this._trigger('expand', {'node': node, 'ui': this});
					this.persist();
				} else {
					var that = this;
					node.addClass('loading');
					this._trigger('loading', {'node': node, 'ui': this});
					$.get(hitarea.attr('href'), function ( data ) {
						node.removeClass('loading');
						node.replaceWith(data);
						node = $('li[id="' + identify + '"]', that.element);
						that._trigger('loaded', {'node': node, 'ui': that});
						if ( isAll ) {
							$('ul > li', node).each( function ( i, node1 ) {
								that.expand($(node1), isAll);
							});
						}
						that.persist();
						that._reset(that.history);
					}, 'html');
				}
			}
		},

		collapse: function( node ) {
			if ( node.is('.collapsable') ) {
				node.removeClass('collapsable');
				node.addClass('expandable');
				this._trigger('collapse', {'node': node, 'ui': this});
				this.persist();
			}
		},

		persist: function() {
			if ( this.options.persist ) {
				var history = {};
				this.element.find('.expandable,.collapsable')
							.each(function( i , node ) {
								node = $(node);
								history[node.attr('id')] = node.is('.collapsable');
							});
				if ( ! $.cookie.json) {
					history = JSON.stringify(history);
				} 
				$.cookie(this.options.persist, history, this.options.cookie);
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
				return false;
	    });
		
		$('body').on('click.tree.data-api', '[data-tree]', function ( e ) {
			var $this = $(e.currentTarget),
				tree = $($this.data('target'));
				$('li', tree).each(function (i, node) {
					tree.tree($this.data('tree'), $(node), true);
				});
	    });
	});
	
}(jQuery));