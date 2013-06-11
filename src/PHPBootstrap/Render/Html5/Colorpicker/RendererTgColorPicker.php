<?php
namespace PHPBootstrap\Render\Html5\Colorpicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererToggle;
use PHPBootstrap\Widget\Colorpicker\TgColorPicker;

/**
 * Renderizador de alterador de seletor de cor
 */
class RendererTgColorPicker extends RendererToggle {

	/**
	 * Nome do toggle
	 * 
	 * @var string
	 */
	const TOGGLENAME = 'colorpicker';

	/**
	 * 
	 * @see RendererToggle::_render()
	 */
	protected function _render( TgColorPicker $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		if ( $ui->getTarget() ) {
			$node->setAttribute('data-target', '#' . $ui->getTarget()->getName());
		} else {
			$node->setAttribute('data-color', $ui->getDefaultValue());
		}
		RenderHelper::render($ui, $node);
	}

}
?>