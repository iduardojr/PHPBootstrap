<?php
namespace PHPBootstrap\Render\Html5\Action;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Action\TgAjax;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderiza atualizador de container
 */
class RendererTgAjax extends RendererTgLink {
	
	/**
	 *
	 * @see RendererTgLink::_render()
	 */
	protected function _render( TgAjax $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('target', $ui->getTarget() instanceof Widget ? $ui->getTarget()->getName() : $ui->getTarget());
		$node->setAttribute('data-response', $ui->getResponse());
	}
	
}
?>