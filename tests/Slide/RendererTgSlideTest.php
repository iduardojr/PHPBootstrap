<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Slide\TgSlide;
use PHPBootstrap\Render\Html5\Slide\RendererTgSlide;
require_once 'tests\RendererTest.php';

/**
 * RendererTgSlide test case.
 */
class RendererTgSlideTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('test');
		
		$w = new TgSlide(new MockSlide(), TgSlide::Next);
		$provider[] = array($w, '<a href="#" data-slide="next" data-target="#slide">test</a>', new Context(clone $node));
		
		$w = new TgSlide(new MockSlide(), 5);
		$provider[] = array($w, '<a href="#" data-slide-to="5" data-target="#slide">test</a>', new Context(clone $node));
		
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgSlide();
	}

}
?>