<?php
namespace PHPBootstrap\Render\Html5\Datepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Datepicker\DatePicker;

/**
 * Renderizador de seletor de data
 */
class RendererDatePicker extends RendererWidget {
	
	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( DatePicker $ui, HtmlNode $node ) {
		$node->addClass('datepicker');
		$node->setAttribute('data-date', $ui->getDefaultValue());
		RenderHelper::render($ui, $node);
	}
}
?>