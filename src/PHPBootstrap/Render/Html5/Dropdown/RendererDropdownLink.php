<?php
namespace PHPBootstrap\Render\Html5\Dropdown;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Dropdown\DropdownLink;
use PHPBootstrap\Widget\Dropdown\TgDropdown;

/**
 * Renderizador do link do dropdown
 */
class RendererDropdownLink extends RendererDependsResponse {

	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( DropdownLink $ui, HtmlNode $node ) {
		$anchor = new HtmlNode('a');
		$anchor->setAttribute('href', '#');
		if ( $ui->getIcon() ) {
			$this->toRender($ui->getIcon(), new Context($anchor));
		}
		$anchor->appendNode($ui->getLabel());
		if ( $ui->getTooltip() ) {
			$this->toRender( $ui->getTooltip(), new Context($anchor));
		}
		if ( $ui->getToggle() ) {
			$toggle = $ui->getToggle();
			if ( $toggle instanceof TgDropdown ) {
				$node->addClass('dropdown-submenu');
				$this->toRender( $toggle->getDropdown(), new Context($node)); 
			} else {
				$this->toRender($toggle, new Context($anchor));
			}
		}
		if ( $ui->getDisabled() ){
			$node->addClass('disabled');
		}
		$node->prependNode($anchor);
	}

}
?>