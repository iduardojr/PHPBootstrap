<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Nav\NavDivider;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador de divisor de navegaчуo
 */
class RendererNavDivider extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( NavDivider $ui, HtmlNode $node ) {
		$parent = $ui->getNavParent();
		if ( !empty($parent) && $parent->getNavParent() ) {
			$node->addClass('divider-vertical');
		} else {
			$node->addClass('divider');
		}
		$node->removeClass('pull-left');
		$node->removeClass('pull-right');
	}
}
?>