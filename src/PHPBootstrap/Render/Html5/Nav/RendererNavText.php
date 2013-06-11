<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Nav\NavText;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador texto da barra de navegaчуo
 */
class RendererNavText extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( NavText $ui, HtmlNode $node ) {
		$p = new HtmlNode('p');
		$p->addClass('navbar-text');
		$p->appendNode($ui->getText());
		$node->appendNode($p);
	}
}
?>