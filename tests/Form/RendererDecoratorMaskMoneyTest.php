<?php
use PHPBootstrap\Format\NumberFormat;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorMaskMoney;
use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorMaskMoney test case.
 */
class RendererDecoratorMaskMoneyTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new MaskMoney(new NumberFormat(2, '.', ''));
		$provider[] = array($w, '<input data-mask-money="'. str_replace('"', '&quot;', '{"symbol":null,"showSymbol":false,"symbolStay":false,"thousands":"","decimal":".","precision":2,"defaultZero":true,"allowZero":true,"allowNegative":true}' ) . '">', new Context(new HtmlNode('input', true)));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorMaskMoney();
	}

}
?>