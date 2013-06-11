<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\Decorator\Embed;

/**
 * Renderizador de decorador de campo de entrada
 */
class RendererDecoratorEmbed extends RendererWidget {

	/**
	 * Nome da tag
	 * 
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see Renderer::render()
	 */
	protected function _render( Embed $ui, HtmlNode $node ) {
		if ( $ui->isPrepend() ) {
			$node->addClass('input-prepend');
		}
		if ( $ui->isAppend() ) {
			$node->addClass('input-append');
		}
		foreach ( $ui->getItems() as $item ) {
			$this->toRender($item, new Context($node));
		}
	}

}
?>