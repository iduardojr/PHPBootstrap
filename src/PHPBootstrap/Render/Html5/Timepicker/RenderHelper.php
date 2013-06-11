<?php
namespace PHPBootstrap\Render\Html5\Timepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Timepicker\AbstractTimePicker;

/**
 * Ajudante
 */
class RenderHelper {


	/**
	 * Renderiza as opcoes
	 *
	 * @param AbstractTimePicker $ui
	 * @param HtmlNode $node
	 */
	public static function render( AbstractTimePicker $ui, HtmlNode $node ) {
		$params['showSeconds'] = $ui->getShowSeconds();
		$params['showMeridian'] = $ui->getShowMeridian();
		$params['startTime'] = $ui->getStartTime();
		$params['endTime'] = $ui->getEndTime();
		$params['minuteStep'] = $ui->getMinuteStep();
		$params['secondStep'] = $ui->getSecondStep();
		$params['showInputs'] = $ui->getShowInputs();
		
		$node->setAttribute('data-time-options', str_replace('"', '&quot;', json_encode($params)));
	}

}
?>