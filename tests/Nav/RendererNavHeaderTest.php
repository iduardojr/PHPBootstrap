<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Nav\NavHeader;
use PHPBootstrap\Render\Html5\Nav\RendererNavHeader;

require_once 'tests\RendererTest.php';

/**
 * RendererNavHeader test case.
 */
class RendererNavHeaderTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new NavHeader('test');
		$provider[] = array($w, '<li class="nav-header">test</li>', new Context(new HtmlNode('li')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNavHeader();
	}

}
?>