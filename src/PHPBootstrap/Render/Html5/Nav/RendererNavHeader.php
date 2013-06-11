<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Nav\NavHeader;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador cabeçalho de navegação
 */
class RendererNavHeader extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( NavHeader $ui, HtmlNode $node ) {
		$node->addClass('nav-header');
		$node->appendNode($ui->getText());
	}
}
?>