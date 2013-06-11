<?php
namespace PHPBootstrap\Render\Html5\Tooltip;

use PHPBootstrap\Render\Html5\HtmlNode;

use PHPBootstrap\Widget\Tooltip\Popover;

/**
 * Renderizador de dica
 */
class RendererPopover extends RendererTooltip {
	
	/**
	 * 
	 * @see RendererTooltip::_render()
	 */
	protected function _render(Popover $ui, HtmlNode $node) {
		parent::_render($ui, $node);
		$node->setAttribute('rel', 'popover');
		if ( $ui->getText() ) {
			$node->setAttribute('data-content', $ui->getText());
		}
	}
}
?>