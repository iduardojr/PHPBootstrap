<?php
namespace PHPBootstrap\Render\Html5\Action;

use PHPBootstrap\Widget\Action\TgStorage;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderiza atualizador de container
 */
class RendererTgStorage extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgStorage $ui, HtmlNode $node ) {
		$node->setTagName('a');
		$node->setAttribute('href', '#');
		$node->setAttribute('data-storage', str_replace('"', '&quot;', json_encode($ui->getData())));
	}
	
}
?>