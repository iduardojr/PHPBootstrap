<?php
namespace PHPBootstrap\Render\Html5\Dropdown;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Dropdown\DropdownHeader;

/**
 * Renderizador do elemento cabecalho do dropdown
 */
class RendererDropdownHeader extends RendererDependsResponse {

	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( DropdownHeader $ui, HtmlNode $node ) {
		$node->addClass('nav-header');
		$node->appendNode($ui->getText());
	}

}
?>