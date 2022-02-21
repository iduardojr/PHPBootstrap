<?php
namespace PHPBootstrap\Render\Html5\Tree;

use PHPBootstrap\Widget\Tree\TreeNode;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Render\Renderer;

/**
 * Renderizador de nó da arvore
 */
class RendererTreeNode extends Renderer {
	
	/**
	 *
	 * @see Renderer::render()
	 */
	public function render( TreeNode $ui, Context $context ) {
		$node = $this->_render($ui);
		if ( $context->getResponse() ) {
			$context->getResponse()->appendNode($node);
		} else {
			$context->setResponse($node);
		}
	}
	
	/**
	 * Template method de render
	 * 
	 * @param TreeNode $ui
	 * @param HtmlNode $node
	 */
	protected function _render( TreeNode $ui ) {
		$node = new HtmlNode('li');
		$node->setAttribute('id', $ui->getIdentify());
		$node->addClass('tree-node');
		if ( $ui->getCollapsable() ) {
			$action = clone $ui->getCollapsable();
			$action->setParameter('key', $ui->getIdentify());
			$hitarea = new HtmlNode('a');
			$hitarea->setAttribute('href', $action->toURI());
		} else {
			$hitarea = new HtmlNode('i');
		}
		$hitarea->addClass('hitarea');
		$hitarea->setAttribute('data-toggle', 'tree');
		$node->appendNode($hitarea);
		
		$span = new HtmlNode('span');
		$span->addClass('tree-label');
		
		if ( $ui->getLabel() instanceof Widget ) {
			$this->toRender($ui->getLabel(), new Context($span));
		} else {
			$span->appendNode($ui->getLabel());
		}
		$node->appendNode($span);
		
		foreach( $ui->getButtons() as $button ) {
			$this->toRender($button, new Context($span));
		}
			
		$ul = new HtmlNode('ul');
		if ( $ui->getNumberNodes() > 0 ) {
			$node->addClass( $ui->getOpened() ? 'collapsable' : 'expandable' );
			foreach( $ui->getNodes() as $item ) {
				$this->toRender($item, new Context($ul));
			}
		}
		$node->appendNode($ul);
		return $node;		
	}
}
?>