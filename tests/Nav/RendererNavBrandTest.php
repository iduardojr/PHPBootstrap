<?php
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Nav\NavBrand;
use PHPBootstrap\Render\Html5\Nav\RendererNavBrand;

require_once 'tests\RendererTest.php';

/**
 * RendererNavBrand test case.
 */
class RendererNavBrandTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new NavBrand('teste');
		$provider[] = array($w, '<div><a href="#" class="brand">teste</a></div>', new Context(new HtmlNode('div')));
		
		$w = new NavBrand('teste');
		$w->setToggle(new TgLink(new Action('Test')));
		$provider[] = array($w, '<div><a href="?class=Test" class="brand">teste</a></div>', new Context(new HtmlNode('div')));

		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNavBrand();
	}

}
?>