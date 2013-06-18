<?php
namespace PHPBootstrap\Render\Html5\Pagination;

use PHPBootstrap\Widget\Pagination\PagerBar;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderiza barra de paginação
 */
class RendererPagerBar extends RendererPaginator {

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
	protected function _render( PagerBar $ui, HtmlNode $node ) {
		$node->addClass('pager-bar');
		$ul = new HtmlNode('ul');
		$current = $this->renderPage($ui, $ul, '', '#CURRENT#');
		$current->addClass('current-change');
		parent::_render($ui, $ul);	
		$node->appendNode($ul);
	}
	
	/**
	 * 
	 * @see RendererPaginator::renderScrolling()
	 */
	protected function renderScrolling( PagerBar $ui, HtmlNode $node, $bound ) {
		$node->appendNode('<li><input type="text" class="span1 current" value="' . $ui->getPaginator()->getPage() . '"></li>');
		$node->appendNode('<li> / </li>');
		$node->appendNode('<li><input type="text" class="span1 total" disabled="disabled" value="' . $bound[1] . '"></li>');
	}
}
?>