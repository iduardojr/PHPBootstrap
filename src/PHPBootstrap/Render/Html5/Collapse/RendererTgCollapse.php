<?php
namespace PHPBootstrap\Render\Html5\Collapse;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Collapse\TgCollapse;

/**
 * Renderiza alternador collapse
 */
class RendererTgCollapse extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgCollapse $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'collapse');
		$node->setAttribute('data-target', '#' . $ui->getTarget()->getIdentify());
		if ( $ui->getContainer() ) {
			$node->setAttribute('data-parent', '#' . $ui->getContainer()->getName());
		}
	}

}
?>