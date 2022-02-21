<?php
namespace PHPBootstrap\Render\Html5\Tree;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Tree\TreeLeaf;

/**
 * Renderizador de folha da arvore
 */
class RendererTreeLeaf extends RendererDependsResponse {
	
	
	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TreeLeaf $ui, HtmlNode $node ) {
		$li = new HtmlNode('li');
		$li->setAttribute('id', $ui->getIdentify());
		$li->addClass('tree-leaf');
		
		$hitarea = new HtmlNode('i');
		$hitarea->addClass('hitarea');
		$li->appendNode($hitarea);
		
		$span = new HtmlNode('span');
		$span->addClass('tree-label');
		
		if ( $ui->getLabel() instanceof Widget ) {
			$this->toRender($ui->getLabel(), new Context($span));
		} else {
			$span->appendNode($ui->getLabel());
		}
		$li->appendNode($span);
		
		foreach( $ui->getButtons() as $button ) {
			$this->toRender($button, new Context($span));
		}
		
		$node->appendNode($li);
		
		return $node;		
	}
}
?>