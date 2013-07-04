<?php
namespace PHPBootstrap\Render\Html5\Tree;

use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Tree\TgTree;
use PHPBootstrap\Render\Html5\HtmlNode;

class RendererTgTree extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgTree $ui, HtmlNode $node ) {
		$node->setAttribute('data-tree', $ui->getToggle());
		$node->setAttribute('data-target', '#' . $ui->getTarget()->getName());
	}
}
?>