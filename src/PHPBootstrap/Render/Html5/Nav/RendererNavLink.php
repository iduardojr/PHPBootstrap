<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Nav\NavLink;

/**
 * Renderizador de item de navegaчуo
 */
class RendererNavLink extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( NavLink $ui, HtmlNode $node ) {
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
			$this->toRender($ui->getToggle(), new Context($anchor));
			if ( $anchor->hasClass('dropdown') || $anchor->hasClass('dropup') ) {
				foreach ( $anchor->getAttribute('class') as $class ) {
					$node->addClass($class);
				}
				foreach ( $anchor->getAllNodes() as $item ) {
					$node->appendNode($item);
				}
			} else {
				$node->appendNode($anchor);
			}
		} else {
			$node->appendNode($anchor);
		}
		if ( $ui->getDisabled() ){
			$node->addClass('disabled');
		}
		
	}
}
?>