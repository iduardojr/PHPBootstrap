<?php
namespace PHPBootstrap\Render\Html5\Tab;

use PHPBootstrap\Widget\Tab\TgTab;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderiza alternado tab
 */
class RendererTgTab extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgTab $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'tab');
		$node->setAttribute('data-target', '#' . $ui->getTarget()->getIdentify());
	}
	
}
?>