<?php
namespace PHPBootstrap\Render\Html5\Action;

use PHPBootstrap\Widget\Action\TgWindows;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderiza alterador nova janela
 */
class RendererTgWindows extends RendererTgLink {

	/**
	 *
	 * @see RendererTgLink::_render()
	 */
	protected function _render( TgWindows $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('target', '_blank');
		if ( $ui->getWidth() || $ui->getHeight() ) {
			$node->setAttribute('data-features', 'width=' . $ui->getWidth() . ',height=' . $ui->getHeight());
		}
	}

}
?>