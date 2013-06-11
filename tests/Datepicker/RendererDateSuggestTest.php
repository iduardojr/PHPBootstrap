<?php
use PHPBootstrap\Format\DateFormat;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Datepicker\RendererDateSuggest;
use PHPBootstrap\Widget\Datepicker\DateSuggest;

require_once 'tests\RendererTest.php';

/**
 * RendererDateSuggest test case.
 */
class RendererDateSuggestTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('suggest');
		
		$w = new DateSuggest(new DateFormat('dd/mm/yyyy'));
		$provider[] = array($w, '<a href="#" data-provide="datepicker" data-date-options="' . str_replace('"', '&quot;', '{"format":"dd\/mm\/yyyy","startDate":null,"endDate":null,"calendarWeeks":false,"weekStart":0,"daysOfWeekDisabled":[],"todayHighlight":true,"todayBtn":true,"autoclose":true}' ) . '">suggest</a>', new Context($node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDateSuggest();
	}

}
?>