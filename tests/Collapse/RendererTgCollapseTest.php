<?php
use PHPBootstrap\Widget\Collapse\TgCollapse;
use PHPBootstrap\Render\Html5\Collapse\RendererTgCollapse;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgSlide test case.
 */
class RendererTgCollapseTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('test');
		
		$w = new TgCollapse(new MockCollapse());
		$provider[] = array($w, '<a href="#" data-toggle="collapse" data-target="#collapse">test</a>', new Context(clone $node) );
		
		$w = new TgCollapse(new MockCollapse(new MockCollapseContainer()));
		$provider[] = array($w, '<a href="#" data-toggle="collapse" data-target="#collapse" data-parent="#container">test</a>', new Context(clone $node) );
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgCollapse();
	}

}
?>