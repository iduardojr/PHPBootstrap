<?php
namespace PHPBootstrap\Render\Html5\Dropdown;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Dropdown\DropdownDivider;

/**
 * Renderizador do elemento divisor do dropdown
 */
class RendererDropdownDivider extends RendererDependsResponse {

	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( DropdownDivider $ui, HtmlNode $node ) {
		$node->addClass('divider');
	}

}
?>