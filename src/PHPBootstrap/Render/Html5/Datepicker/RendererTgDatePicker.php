<?php
namespace PHPBootstrap\Render\Html5\Datepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererToggle;
use PHPBootstrap\Widget\Datepicker\TgDatePicker;

/**
 * Renderizador de alterador de seletor de data
 */
class RendererTgDatePicker extends RendererToggle {

	/**
	 * Nome do toggle
	 * 
	 * @var string
	 */
	const TOGGLENAME = 'datepicker';

	/**
	 * 
	 * @see RendererToggle::_render()
	 */
	protected function _render( TgDatePicker $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		if ( $ui->getTarget() ) {
			$node->setAttribute('data-target', '#' . $ui->getTarget()->getName());
		} else {
			$node->setAttribute('data-date', $ui->getDefaultValue());
		}
		RenderHelper::render($ui, $node);
	}

}
?>