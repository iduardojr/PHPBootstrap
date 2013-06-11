<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Widget\Misc\Label;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderizador de rotulo
 */
class RendererLabel extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'span';

	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Label $ui, HtmlNode $node ) {
		$node->addClass('label');
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		$node->appendNode($ui->getText());
	}

}
?>