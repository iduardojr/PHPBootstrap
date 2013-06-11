<?php
namespace PHPBootstrap\Render\Html5\Timepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererToggle;
use PHPBootstrap\Widget\Timepicker\TgTimePicker;

/**
 * Renderizador de alterador de seletor de hora
 */
class RendererTgTimePicker extends RendererToggle {

	/**
	 * Nome do toggle
	 * 
	 * @var string
	 */
	const TOGGLENAME = 'timepicker';

	/**
	 * 
	 * @see RendererToggle::_render()
	 */
	protected function _render( TgTimePicker $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		if ( $ui->getTarget() ) {
			$node->setAttribute('data-target', '#' . $ui->getTarget()->getName());
		} else {
			$node->setAttribute('data-time', $ui->getDefaultValue());
		}
		RenderHelper::render($ui, $node);
	}

}
?>