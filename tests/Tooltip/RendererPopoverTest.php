<?php
use PHPBootstrap\Widget\Tooltip\Popover;

use PHPBootstrap\Render\Html5\Tooltip\RendererPopover;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTooltip test case.
 */
class RendererPopoverTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('test');
		
		$w = new Popover('Title', 'Warning! Best check yo self, you\'re not looking too good.');
		$provider[] = array($w, '<a href="#" rel="popover" title="Title" data-content="Warning! Best check yo self, you\'re not looking too good.">test</a>', new Context(clone $node));
		
		$w = new Popover('Title', 'Warning! Best check yo self, you\'re not looking too good.');
		$w->setAnimation(false);
		$provider[] = array($w, '<a href="#" rel="popover" title="Title" data-animation="false" data-content="Warning! Best check yo self, you\'re not looking too good.">test</a>', new Context(clone $node));
		
		$w = new Popover('Title', 'Warning! Best check yo self, you\'re not looking too good.');
		$w->setDelay(1000);
		$provider[] = array($w, '<a href="#" rel="popover" title="Title" data-delay="1000" data-content="Warning! Best check yo self, you\'re not looking too good.">test</a>', new Context(clone $node));
		
		$w = new Popover('Title', 'Warning! Best check yo self, you\'re not looking too good.');
		$w->setPlacement(Popover::Below);
		$provider[] = array($w, '<a href="#" rel="popover" title="Title" data-placement="bottom" data-content="Warning! Best check yo self, you\'re not looking too good.">test</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererPopover();
	}

}
?>