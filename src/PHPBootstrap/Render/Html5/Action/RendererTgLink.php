<?php
namespace PHPBootstrap\Render\Html5\Action;

use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de alternador de link
 */
class RendererTgLink extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererToggle::_render()
	 */
	protected function _render( TgLink $ui, HtmlNode $node ) {
		$node->setTagName('a');
		$node->setAttribute('href', $ui->getAction()->toURI());
	}

}
?>