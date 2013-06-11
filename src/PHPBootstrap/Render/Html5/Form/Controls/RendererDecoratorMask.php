<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\Mask;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de uma mascara
 */
class RendererDecoratorMask extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Mask $ui, HtmlNode $node ) {
		$node->setAttribute('data-mask', $ui->getPattern());
	}

}
?>