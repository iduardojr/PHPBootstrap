<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Form\Controls\Decorator\Suggest;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorSuggest;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorSuggest test case.
 */
class RendererDecoratorSuggestTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('input', true);
		$node->setAttribute('type', 'text');
		
		$w = new Suggest(new Action('Test'));
		$provider[] = array($w, '<input type="text" data-provide="suggest" data-source="?class=Test">', new Context(clone $node));
		
		$w = new Suggest(new Action('Test'));
		$w->setItems(8);
		$provider[] = array($w, '<input type="text" data-provide="suggest" data-source="?class=Test" data-items="8">', new Context(clone $node));
		
		$w = new Suggest(new Action('Test'));
		$w->setMinLength(3);
		$provider[] = array($w, '<input type="text" data-provide="suggest" data-source="?class=Test" data-min-length="3">', new Context(clone $node));
		
		$w = new Suggest(new Action('Test'));
		$w->setDelay(300);
		$provider[] = array($w, '<input type="text" data-provide="suggest" data-source="?class=Test" data-delay="300">', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorSuggest();
	}

}
?>