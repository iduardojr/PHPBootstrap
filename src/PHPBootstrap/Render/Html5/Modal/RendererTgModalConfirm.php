<?php
namespace PHPBootstrap\Render\Html5\Modal;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Modal\TgModalConfirm;

/**
 * Renderiza alternador de confirmação do modal
 */
class RendererTgModalConfirm extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgModalConfirm $ui, HtmlNode $node ) {
		$node->setAttribute('data-dismiss', 'confirm');
	}
}
?>