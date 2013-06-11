<?php
namespace PHPBootstrap\Render\Html5\Pagination;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\AbstractPaginator;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderiza paginação abstrata
 */
abstract class RendererPaginator extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'ul';

	/**
	 *
	 * @see Renderer::_render()
	 */
	protected function _render( AbstractPaginator $ui, HtmlNode $node ) {
		
		if ( $ui->getLabelPageFirst() ) {
			$this->renderPage($ui, $node, $ui->getLabelPageFirst(), Paginator::PageFirst);
		}

		if ( $ui->getLabelPagePrev() ) {
			$this->renderPage($ui, $node, $ui->getLabelPagePrev(), Paginator::PagePrev);
		}
		
		$this->renderPagesOfMiddle($ui, $node);
		
		if ( $ui->getLabelPageNext() ) {
			$this->renderPage($ui, $node, $ui->getLabelPageNext(), Paginator::PageNext);
		}
		
		if ( $ui->getLabelPageLast() ) {
			$this->renderPage($ui, $node, $ui->getLabelPageLast(), Paginator::PageLast);
		}
	}
	
	/**
	 * Renderiza as paginas do meio
	 *
	 * @param AbstractPaginator $ui
	 * @param HtmlNode $node
	 */
	protected function renderPagesOfMiddle( AbstractPaginator $ui, HtmlNode $node  ) {
		if ( $ui->getLimitPages() ) {
			$range = $ui->getRangeOfPages();
			for ( $page = $range->start; $page <= $range->end; $page++ ) {
				$this->renderPage($ui, $node, ( $page < 10 ? '0' : '' ) . $page, $page);
			}
		}
	}

	/**
	 * Renderiza a pagina
	 *
	 * @param AbstractPaginator $ui
	 * @param HtmlNode $node
	 * @param integer|string $page
	 * @param string $label
	 * @return HtmlNode
	 */
	protected function renderPage( AbstractPaginator $ui, HtmlNode $node,  $label, $page ) {
		$toggle = $ui->getToggle();
		$toggle->setParameter('page', $page);
		
		$li = new HtmlNode('li');
		
		$anchor = new HtmlNode('a');
		$anchor->setAttribute('href', '#');
		$anchor->appendNode($label);
		
		$pages = array( Paginator::PageFirst, Paginator::PagePrev, Paginator::PageNext, Paginator::PageLast);
		if ( in_array($page, $pages) ) {
			$li->addClass('page-' . $page);
			$this->renderPagesOfBorder($ui, $li, $page);
			$page = $page == Paginator::PageFirst || $page == Paginator::PagePrev ? 1 : $ui->getTotalPages();
			if ( $ui->getCurrentPage() == $page ) {
				$li->addClass('disabled');
			}
			$this->toRender($toggle, new Context($anchor));
		} else {
			if ( $ui->getCurrentPage() == $page ) {
				$li->addClass('active');
			} else {
				$this->toRender($toggle, new Context($anchor));
			}
		}
		$li->appendNode($anchor);
		$node->appendNode($li);
		return $li;
	}
	
	/**
	 * Renderiza as paginas das bordas
	 * 
	 * @param AbstractPaginator $ui
	 * @param HtmlNode $li
	 * @param string $page
	 */
	protected function renderPagesOfBorder( AbstractPaginator $ui, HtmlNode $li, $page ) {
		
	}
	
}
?>