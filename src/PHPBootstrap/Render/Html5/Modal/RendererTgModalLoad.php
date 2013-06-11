<?php
namespace PHPBootstrap\Render\Html5\Modal;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Action\RendererTgAjax;
use PHPBootstrap\Widget\Modal\TgModalLoad;

/**
 * Renderiza alternador de carregamento do modal
 */
class RendererTgModalLoad extends RendererTgAjax {
	
	/**
	 * 
	 * @see RendererTgAjax::_render()
	 */
	protected function _render(TgModalLoad $ui, HtmlNode $node) {
		parent::_render($ui, $node);
		$node->setAttribute('data-toggle', 'modal-load');
	}
}
?>