<?php
namespace PHPBootstrap\Render\Html5\Colorpicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Colorpicker\AbstractColorPicker;

/**
 * Ajudante
 */
class RenderHelper {

	/**
	 * Renderiza as opcoes
	 * 
	 * @param AbstractDatePicker $ui
	 * @param HtmlNode $node
	 */
	public static function render( AbstractColorPicker $ui, HtmlNode $node ) {
		$params['format'] = $ui->getFormat();
		$node->setAttribute('data-color-options', str_replace('"', '&quot;', json_encode($params)));
	}

}
?>