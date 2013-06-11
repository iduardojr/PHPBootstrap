<?php
namespace PHPBootstrap\Render\Html5\Pagination;

use PHPBootstrap\Widget\Pagination\Paginator;

use PHPBootstrap\Widget\Pagination\Pager;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderiza paginador
 */
class RendererPager extends RendererPaginator {


	/**
	 * 
	 * @see RendererPaginator::_render()
	 */
	protected function _render( Pager $ui, HtmlNode $node ) {
		$node->addClass('pager');
		parent::_render($ui, $node);
	}
	
	/**
	 * 
	 * @see RendererPaginator::renderPagesOfBorder()
	 */
	protected function renderPagesOfBorder( Pager $ui, HtmlNode $li, $page ) {
		if ( $ui->getAligned() ) {
			if ( $page == Paginator::PageFirst || ( $page == Paginator::PagePrev && $ui->getLabelPageFirst() == '' ) ) {
				$li->addClass('previous');
			} elseif ( $page == Paginator::PageLast || ( $page == Paginator::PageNext && $ui->getLabelPageLast() == '' ) ) {
				$li->addClass('next');
			}
		}
	}

}
?>