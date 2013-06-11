<?php
use PHPBootstrap\Format\TimeFormat;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Timepicker\RendererTgTimePicker;
use PHPBootstrap\Widget\Timepicker\TgTimePicker;

require_once 'tests\RendererTest.php';

/**
 * RendererTgTimePicker test case.
 */
class RendererTgTimePickerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('toggle');
	
		$w = new TgTimePicker(new TimeFormat('HH:mm:ss'));
		$provider[] = array($w, '<a href="#" data-toggle="timepicker" data-time-options="' . str_replace('"', '&quot;', '{"showSeconds":true,"showMeridian":false,"startTime":null,"endTime":null,"minuteStep":15,"secondStep":15,"showInputs":false}' ) . '">toggle</a>', new Context(clone $node));
	
		$w = new TgTimePicker(new TimeFormat('HH:mm:ss'));
		$w->setDefaultValue('05:15');
		$provider[] = array($w, '<a href="#" data-toggle="timepicker" data-time="05:15:00" data-time-options="' . str_replace('"', '&quot;', '{"showSeconds":true,"showMeridian":false,"startTime":null,"endTime":null,"minuteStep":15,"secondStep":15,"showInputs":false}' ) . '">toggle</a>', new Context(clone $node));
		
		$w = new TgTimePicker(new TimeFormat('HH:mm:ss'));
		$w->setTarget(new MockEntry());
		$provider[] = array($w, '<a href="#" data-toggle="timepicker" data-target="#entry" data-time-options="' . str_replace('"', '&quot;', '{"showSeconds":true,"showMeridian":false,"startTime":null,"endTime":null,"minuteStep":15,"secondStep":15,"showInputs":false}' ) . '">toggle</a>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgTimePicker();
	}

}
?>