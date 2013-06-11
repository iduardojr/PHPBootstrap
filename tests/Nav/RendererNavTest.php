<?php
use PHPBootstrap\Widget\Nav\NavDivider;
use PHPBootstrap\Widget\Nav\NavItem;
use PHPBootstrap\Widget\Nav\NavHeader;
use PHPBootstrap\Widget\Nav\Nav;
use PHPBootstrap\Render\Html5\Nav\RendererNav;

require_once 'tests\RendererTest.php';

/**
 * RendererNav test case.
 */
class RendererNavTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Nav();
		$provider[] = array($w, '<ul class="nav"></ul>');
		
		$w = new Nav(Nav::Tabs);
		$provider[] = array($w, '<ul class="nav nav-tabs"></ul>');
		
		$w = new Nav();
		$w->setName('nav');
		$provider[] = array($w, '<ul id="nav" class="nav"></ul>');
		
		$w = new Nav();
		$w->addItem(new NavHeader('Home'), NavItem::Left);
		$provider[] = array($w, '<ul class="nav"><li class="pull-left nav-header">Home</li></ul>');
		
		$w = new Nav();
		$w->addItem(new NavDivider(), NavItem::Left);
		$provider[] = array($w, '<ul class="nav"><li class="divider"></li></ul>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNav();
	}

}
?>