<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorMask;
use PHPBootstrap\Widget\Form\Controls\Decorator\Mask;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorMask test case.
 */
class RendererDecoratorMaskTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Mask(Mask::DateBR);
		$provider[] = array($w, '<input data-mask="?99/99/9999">', new Context(new HtmlNode('input', true)));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorMask();
	}

}
?>