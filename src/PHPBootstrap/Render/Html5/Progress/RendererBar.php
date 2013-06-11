<?php
namespace PHPBootstrap\Render\Html5\Progress;

use PHPBootstrap\Widget\Progress\Bar;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderiza barra de progresso
 */
class RendererBar extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Bar $ui, HtmlNode $parent ) {
		$node = new HtmlNode('div');
		$node->addClass('bar');
		
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		
		$node->addStyle('width', $ui->getValue() . '%');
		if ( $ui->getLabel() ) {
			$node->appendNode($ui->getLabel());
		}
		
		$parent->appendNode($node);
	}

}
?>