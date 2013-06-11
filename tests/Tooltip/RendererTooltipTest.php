<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Render\Html5\Tooltip\RendererTooltip;

require_once 'tests\RendererTest.php';

/**
 * RendererTooltip test case.
 */
class RendererTooltipTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('test');
		
		$w = new Tooltip('Title');
		$provider[] = array($w, '<a href="#" rel="tooltip" title="Title">test</a>', new Context(clone $node));
		
		$w = new Tooltip('Title');
		$w->setAnimation(false);
		$provider[] = array($w, '<a href="#" rel="tooltip" title="Title" data-animation="false">test</a>', new Context(clone $node));
		
		$w = new Tooltip('Title');
		$w->setDelay(1000);
		$provider[] = array($w, '<a href="#" rel="tooltip" title="Title" data-delay="1000">test</a>', new Context(clone $node));
		
		$w = new Tooltip('Title');
		$w->setPlacement(Tooltip::Below);
		$provider[] = array($w, '<a href="#" rel="tooltip" title="Title" data-placement="bottom">test</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTooltip();
	}

}
?>