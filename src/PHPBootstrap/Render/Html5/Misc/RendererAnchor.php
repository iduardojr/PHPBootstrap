<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Misc\Anchor;

/**
 * Renderizador de ancoras
 */
class RendererAnchor extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'a';

	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Anchor $ui, HtmlNode $node ) {
		$node->setAttribute('href', '#');
		$node->appendNode($ui->getLabel());
		if ( $ui->getDisabled() ) {
			$node->addClass('disabled');
		}
		if ( $ui->getTooltip() ) {
			$this->toRender($ui->getTooltip(), new Context($node));
		}
		if ( $ui->getToggle() ) {
			$this->toRender($ui->getToggle(), new Context($node));
		}
	}

}
?>