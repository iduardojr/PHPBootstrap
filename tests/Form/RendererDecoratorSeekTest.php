<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\Seek;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorSeek;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorSeek test case.
 */
class RendererDecoratorSeekTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('input', true);
		$node->setAttribute('type', 'text');
		
		$w = new Seek(new Action('Test'));
		$provider[] = array($w, '<input type="text" data-provide="seek" data-source="?class=Test">', new Context($node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorSeek();
	}

}
?>