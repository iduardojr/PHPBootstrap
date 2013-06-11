<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Nav\NavText;
use PHPBootstrap\Render\Html5\Nav\RendererNavText;

require_once 'tests\RendererTest.php';

/**
 * RendererNavText test case.
 */
class RendererNavTextTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new NavText('test');
		$provider[] = array($w, '<div><p class="navbar-text">test</p></div>', new Context(new HtmlNode('div')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNavText();
	}

}
?>