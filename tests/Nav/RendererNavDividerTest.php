<?php
use PHPBootstrap\Widget\Nav\Navbar;
use PHPBootstrap\Widget\Nav\Nav;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Nav\NavDivider;
use PHPBootstrap\Render\Html5\Nav\RendererNavDivider;

require_once 'tests\RendererTest.php';

/**
 * RendererNavDivider test case.
 */
class RendererNavDividerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new NavDivider();
		$provider[] = array($w, '<li class="divider"></li>', new Context(new HtmlNode('li')));
		
		$w = new NavDivider();
		$li = new HtmlNode('li');
		$li->addClass('pull-left');
		$li->addClass('pull-right');
		$provider[] = array($w, '<li class="divider"></li>', new Context($li));
		
		
		$w = new NavDivider();
		$w->setNavParent(new Nav());
		$provider[] = array($w, '<li class="divider"></li>', new Context(new HtmlNode('li')));
		
		$w = new NavDivider();
		$nav = new Nav();
		$nav->setParent(new Navbar('dd'));
		$w->setNavParent($nav);
		$provider[] = array($w, '<li class="divider-vertical"></li>', new Context(new HtmlNode('li')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNavDivider();
	}

}
?>