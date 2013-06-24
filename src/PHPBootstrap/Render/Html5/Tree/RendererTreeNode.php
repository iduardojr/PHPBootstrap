<?php
namespace PHPBootstrap\Render\Html5\Tree;

use PHPBootstrap\Widget\Tree\TreeNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador de nó da arvore
 */
class RendererTreeNode extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( TreeNode $ui, HtmlNode $node ) {
		$li = new HtmlNode('li');

		$li->setAttribute('id', $ui->getName());
		
		$hitarea = new HtmlNode('i');
		$hitarea->addClass('hitarea');
		$li->appendNode($hitarea);
		
		$span = new HtmlNode('span');
		if ( $ui->getLabel() instanceof Widget ) {
			$this->toRender($ui->getLabel(), new Context($span));
		} else {
			$span->appendNode($ui->getLabel());
		}
		$li->appendNode($span);
		
		foreach( $ui->getButtons() as $button ) {
			$this->toRender($button, new Context($li));
		}
		
		if ( ! $ui->isLeaf() ) {
			$li->addClass($ui->getOpened() ? 'collapsable' : 'expandable');
			$hitarea->setAttribute('data-toggle', 'tree');
			$ul = new HtmlNode('ul');
			foreach( $ui->getNodes() as $item ) {
				$this->toRender($item, new Context($ul));
			}
			$li->appendNode($ul);
		}
		
		$node->appendNode($li);
	}
}
?>