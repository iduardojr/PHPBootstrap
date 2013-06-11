<?php
namespace PHPBootstrap\Render\Html5\Layout;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Layout\Row;

/**
 * Renderiza a linha
 */
class RendererRow extends RendererWidget {
	
	// Tag
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Row $ui, HtmlNode $node ) {
		$node->addClass('row' . ( $ui->getFluid() ? '-fluid' : '' ));
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
	}

}
?>