<?php
use PHPBootstrap\Format\DateFormat;

use PHPBootstrap\Widget\Datepicker\DatePicker;
use PHPBootstrap\Render\Html5\Datepicker\RendererDatePicker;

require_once 'tests\RendererTest.php';

/**
 * RendererDatePicker test case.
 */
class RendererDatePickerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new DatePicker(new DateFormat('dd/mm/yyyy'));
		$provider[] = array($w, '<div class="datepicker" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '"></div>');
		
		$w = new DatePicker(new DateFormat('dd/mm/yyyy'));
		$w->setName('calendar');
		$provider[] = array($w, '<div id="calendar" class="datepicker" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '"></div>');
		
		$w = new DatePicker(new DateFormat('dd/mm/yyyy'));
		$w->setDefaultValue('06/10/1985');
		$provider[] = array($w, '<div class="datepicker" data-date="06/10/1985" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '"></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDatePicker();
	}

}
?>