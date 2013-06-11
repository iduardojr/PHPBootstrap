<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorAddOn;
use PHPBootstrap\Widget\Form\Controls\Decorator\AddOn;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorAddOn test case.
 */
class RendererDecoratorAddOnTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new AddOn('Test');
		$provider[] = array($w, '<div><span class="add-on">Test</span></div>', new Context(new HtmlNode('div')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorAddOn();
	}

}
?>