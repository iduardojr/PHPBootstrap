<?php
namespace PHPBootstrap\Render\Html5\Dropdown;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Dropdown\TgDropdown;

/**
 * Renderizador do alternador do dropdrown
 */
class RendererTgDropDown extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgDropdown $ui, HtmlNode $node ) {
		$clone = clone $node;
		$node->clear();
		$node->setTagName('div');
		$node->addClass($ui->getDropup() ? 'dropup' : 'dropdown');
		$clone->addClass('dropdown-toggle');
		$clone->setAttribute('data-toggle', 'dropdown');
		if ( $ui->getCaret() ) {
			$clone->appendNode('<span class="caret"></span>');
		}
		$node->appendNode($clone);
		$this->toRender($ui->getDropdown(), new Context($node));
	}
}
?>