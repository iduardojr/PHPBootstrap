<?php
use PHPBootstrap\Format\TimeFormat;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Timepicker\RendererTimeSuggest;
use PHPBootstrap\Widget\Timepicker\TimeSuggest;

require_once 'tests\RendererTest.php';

/**
 * RendererTimeSuggest test case.
 */
class RendererTimeSuggestTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('suggest');
		
		$w = new TimeSuggest(new TimeFormat('HH:mm:ss'));
		$provider[] = array($w, '<a href="#" data-provide="timepicker" data-time-options="' . str_replace('"', '&quot;', '{"showSeconds":true,"showMeridian":false,"startTime":null,"endTime":null,"minuteStep":15,"secondStep":15,"showInputs":false}' ) . '">suggest</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTimeSuggest();
	}

}
?>