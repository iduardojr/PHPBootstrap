<?php
use PHPBootstrap\Render\Html5\HtmlNode;

use PHPBootstrap\Render\Context;

use PHPBootstrap\Widget\Progress\Bar;

use PHPBootstrap\Render\Html5\Progress\RendererBar;

require_once 'tests\RendererTest.php';

/**
 * RendererBar test case.
 */
class RendererBarTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		
		$w = new Bar(10);
		$provider[] = array($w, '<div><div class="bar" style="width: 10%"></div></div>', new Context(new HtmlNode('div')));
		
		$w = new Bar(10);
		$w->setStyle(Bar::Danger);
		$provider[] = array($w, '<div><div class="bar bar-danger" style="width: 10%"></div></div>', new Context(new HtmlNode('div')));
		
		$w = new Bar(10);
		$w->setLabel('last');
		$provider[] = array(clone $w, '<div><div class="bar" style="width: 10%">last</div></div>', new Context(new HtmlNode('div')));
		
		return $provider;
		
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererBar();
	}

}
?>