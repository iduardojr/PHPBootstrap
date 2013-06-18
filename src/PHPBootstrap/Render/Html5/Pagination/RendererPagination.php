<?php
namespace PHPBootstrap\Render\Html5\Pagination;

use PHPBootstrap\Widget\Pagination\Pagination;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderiza paginador
 */
class RendererPagination extends RendererPaginator {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';
	
	/**
	 * 
	 * @see RendererPaginator::_render()
	 */
	protected function _render( Pagination $ui, HtmlNode $node ) {
		$node->addClass('pagination');
		
		if ( $ui->getAlign() ) {
			$node->addClass( $ui->getAlign());
		}
		
		if ( $ui->getSize() ) {
			$node->addClass($ui->getSize());
		}
		
		$ul = new HtmlNode('ul');
		parent::_render($ui, $ul);
		$node->appendNode($ul);
	}

}
?>