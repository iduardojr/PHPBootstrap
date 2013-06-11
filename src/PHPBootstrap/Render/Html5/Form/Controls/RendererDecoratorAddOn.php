<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Form\Controls\Decorator\AddOn;

/**
 * Renderizador de adicionais do decorador
 */
class RendererDecoratorAddOn extends RendererDependsResponse {

	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( AddOn $ui, HtmlNode $node ) {
		$inner = new HtmlNode('span');
		$inner->addClass('add-on');
		$inner->appendNode($ui->getText());
		$node->appendNode($inner);
	}

}
?>