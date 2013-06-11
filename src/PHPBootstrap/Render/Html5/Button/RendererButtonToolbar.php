<?php
namespace PHPBootstrap\Render\Html5\Button;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Button\ButtonToolbar;

/**
 * Renderiza barra de botoes
 */
class RendererButtonToolbar extends RendererWidget {

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
	protected function _render( ButtonToolbar $ui, HtmlNode $node ) {
		$node->addClass('btn-toolbar');
		foreach ( $ui->getButtonGroups() as $buttonGroup ) {
			$this->toRender($buttonGroup, new Context($node));
		}
	}

}
?>