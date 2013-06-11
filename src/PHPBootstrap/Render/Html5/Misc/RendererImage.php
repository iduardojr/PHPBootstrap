<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderiza imagem
 */
class RendererImage extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'img';

	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Image $ui, HtmlNode $node ) {
		$node->setSingle(true);
		$node->setAttribute('src', $ui->getSource());
		
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
	}

}
?>