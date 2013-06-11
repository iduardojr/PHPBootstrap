<?php
namespace PHPBootstrap\Render\Html5\Modal;

use PHPBootstrap\Widget\Modal\TgModalClose;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderiza alternador que fecha o modal
 */
class RendererTgModalClose extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgModalClose $ui, HtmlNode $node ) {
		$node->setAttribute('data-dismiss', 'modal');
	}
}
?>