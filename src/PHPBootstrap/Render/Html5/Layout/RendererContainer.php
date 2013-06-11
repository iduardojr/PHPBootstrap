<?php
namespace PHPBootstrap\Render\Html5\Layout;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Layout\Container;

/**
 * Renderiza o container
 */
class RendererContainer extends RendererWidget {
	
	// Tag
	const TAGNODE = 'div';

	/**
	 *
	 * @see PHPBootstrap\Render\Html5\RendererContainer::_render()
	 */
	protected function _render( Container $ui, HtmlNode $node ) {
		$node->addClass('container' . ( $ui->getFluid() ? '-fluid' : '' ));
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
	}

}
?>