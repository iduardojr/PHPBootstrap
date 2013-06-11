<?php
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorTypeHead;
use PHPBootstrap\Widget\Form\Controls\Decorator\TypeHead;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorTypeHead test case.
 */
class RendererDecoratorTypeHeadTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('input', true);
		$node->setAttribute('type', 'text');
		
		$w = new TypeHead();
		$provider[] = array($w, '<input type="text" data-provide="typeahead" data-source="[]">', new Context(clone $node));
		
		$w = new TypeHead();
		$w->setItems(8);
		$provider[] = array($w, '<input type="text" data-provide="typeahead" data-source="[]" data-items="8">', new Context(clone $node));
		
		$w = new TypeHead();
		$w->setMinLength(2);
		$provider[] = array($w, '<input type="text" data-provide="typeahead" data-source="[]" data-min-length="2">', new Context(clone $node));
		
		$w = new TypeHead(array('Mirian', 'Iduardo Junior', 'Guilherme'));
		$provider[] = array($w, '<input type="text" data-provide="typeahead" data-source="[&quot;Mirian&quot;,&quot;Iduardo Junior&quot;,&quot;Guilherme&quot;]">', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorTypeHead();
	}

}
?>