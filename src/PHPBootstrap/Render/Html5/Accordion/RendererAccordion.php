<?php
namespace PHPBootstrap\Render\Html5\Accordion;

use PHPBootstrap\Render\Context;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Accordion\Accordion;

/**
 * Renderiza um accordion
 */
class RendererAccordion extends RendererWidget {

	/**
	 * Nome da tag
	 * 
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Accordion $ui, HtmlNode $node ) {
		$node->addClass('accordion');
		foreach ( $ui->getItems() as $item ) {
			$this->toRender($item, new Context($node));
		}
	}

}
?>