<?php
namespace PHPBootstrap\Render\Html5\Tree;

use PHPBootstrap\Widget\Tree\Tree;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;

/**
 * Renderizador de arvore
 */
class RendererTree extends RendererWidget {
	
	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'ul';
	
	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Tree $ui, HtmlNode $node ) {
		$node->addClass('tree');
		
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		
		foreach( $ui->getNodes() as $item ) {
			$this->toRender($item, new Context($node));
		}
	}
}
?>