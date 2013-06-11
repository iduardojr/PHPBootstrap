<?php
namespace PHPBootstrap\Render\Html5\Layout;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Layout\Panel;
use PHPBootstrap\Widget\Widget;

/**
 * Renderiza o painel
 */
class RendererPanel extends RendererWidget {

	// Tag
	const TAGNODE = 'div';
	
	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Panel $ui, HtmlNode $node ) {
		if ( $ui->getContent() instanceof Widget ) {
			$this->toRender($ui->getContent(), new Context($node));
		} else {
			$node->appendNode((string) $ui->getContent());
		}
	}

}
?>