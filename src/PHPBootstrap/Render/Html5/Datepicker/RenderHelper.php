<?php
namespace PHPBootstrap\Render\Html5\Datepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Datepicker\AbstractDatePicker;

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
	public static function render( AbstractDatePicker $ui, HtmlNode $node ) {
		$params['format'] = $ui->getFormat()->pattern();
		$params['startDate'] = $ui->getStartDate();
		$params['endDate'] = $ui->getEndDate();
		$params['calendarWeeks'] = $ui->getCalendarWeeks();
		$params['weekStart'] = $ui->getWeekStart();
		$params['daysOfWeekDisabled'] = $ui->getDaysOfWeekDisabled();
		$params['todayHighlight'] = $ui->getTodayHighlight();
		$params['todayBtn'] = $ui->getTodayButton();
		$params['autoclose'] = $ui->getAutoclose();
		
		$node->setAttribute('data-date-options', str_replace('"', '&quot;', json_encode($params)));
	}

}
?>