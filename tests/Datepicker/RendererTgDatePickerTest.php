<?php
use PHPBootstrap\Format\DateFormat;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Datepicker\TgDatePicker;
use PHPBootstrap\Render\Html5\Datepicker\RendererTgDatePicker;

require_once 'tests\RendererTest.php';

/**
 * RendererTgDatePicker test case.
 */
class RendererTgDatePickerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('toggle');
		
		$w = new TgDatePicker(new DateFormat('dd/mm/yyyy'));
		$provider[] = array($w, '<a href="#" data-toggle="datepicker" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '">toggle</a>', new Context(clone $node));
		
		$w = new TgDatePicker(new DateFormat('dd/mm/yyyy'));
		$w->setDefaultValue('06/10/1985');
		$provider[] = array($w, '<a href="#" data-toggle="datepicker" data-date="06/10/1985" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '">toggle</a>', new Context(clone $node));
		
		$w = new TgDatePicker(new DateFormat('dd/mm/yyyy'));
		$w->setTarget(new MockEntry());
		$provider[] = array($w, '<a href="#" data-toggle="datepicker" data-target="#entry" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '">toggle</a>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgDatePicker();
	}

}
?>