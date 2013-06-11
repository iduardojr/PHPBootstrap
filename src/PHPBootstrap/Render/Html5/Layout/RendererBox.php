<?php
namespace PHPBootstrap\Render\Html5\Layout;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Layout\Box;

/**
 * Renderiza o caixa
 */
class RendererBox extends RendererWidget {

	// Tag
	const TAGNODE = 'div';
	
	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Box $ui, HtmlNode $node ) {
		if ( $ui->getSpan() ) {
			$node->addClass('span' . $ui->getSpan());
		}
		if ( $ui->getOffset() ) {
			$node->addClass('offset' . $ui->getOffset());
		}
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
	}

}
?>