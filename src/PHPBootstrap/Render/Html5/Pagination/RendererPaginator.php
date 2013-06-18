<?php
namespace PHPBootstrap\Render\Html5\Pagination;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\AbstractPagination;
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
	protected function _render( AbstractPagination $ui, HtmlNode $node ) {
		
		if ( $ui->getLabelFirst() ) {
			$this->renderPage($ui, $node, $ui->getLabelFirst(), Paginator::PageFirst);
		}

		if ( $ui->getLabelPrev() ) {
			$this->renderPage($ui, $node, $ui->getLabelPrev(), Paginator::PagePrev);
		}
		
		if ( $ui->getScroll() ) {
			$bound = $ui->getScroll()->getPages($ui->getPaginator());
			$this->renderScrolling($ui, $node, $bound);
		}
		
		if ( $ui->getLabelNext() ) {
			$this->renderPage($ui, $node, $ui->getLabelNext(), Paginator::PageNext);
		}
		
		if ( $ui->getLabelLast() ) {
			$this->renderPage($ui, $node, $ui->getLabelLast(), Paginator::PageLast);
		}
	}
	
	/**
	 * Renderiza as paginas do meio
	 *
	 * @param AbstractPagination $ui
	 * @param HtmlNode $node
	 * @param array $bound
	 */
	protected function renderScrolling( AbstractPagination $ui, HtmlNode $node, $bound ) {
		for ( $page = $bound[0]; $page <= $bound[1]; $page++ ) {
			$this->renderPage($ui, $node, ( $page < 10 ? '0' : '' ) . $page, $page);
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
	protected function renderPage( AbstractPagination $ui, HtmlNode $node,  $label, $page ) {
		$toggle = $ui->getToggle();
		$toggle->setParameter('page', $page);
		
		$li = new HtmlNode('li');
		
		$anchor = new HtmlNode('a');
		$anchor->setAttribute('href', '#');
		$anchor->appendNode($label);
		
		$pages = array( Paginator::PageFirst, Paginator::PagePrev, Paginator::PageNext, Paginator::PageLast);
		if ( in_array($page, $pages) ) {
			$li->addClass('page-' . $page);
			$this->decorate($ui, $li, $page);
			$page = $page == Paginator::PageFirst || $page == Paginator::PagePrev ? 1 : $ui->getPaginator()->getPages();
			if ( $ui->getPaginator()->getPage() == $page ) {
				$li->addClass('disabled');
			}
			$this->toRender($toggle, new Context($anchor));
		} else {
			if ( $ui->getPaginator()->getPage() == $page ) {
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
	 * Decora as paginas
	 * 
	 * @param AbstractPagination $ui
	 * @param HtmlNode $li
	 * @param string $page
	 */
	protected function decorate( AbstractPagination $ui, HtmlNode $li, $page ) {
		
	}
	
}
?>