<?php
use PHPBootstrap\Widget\Nav\NavItem;
use PHPBootstrap\Widget\Nav\NavBrand;
use PHPBootstrap\Widget\Nav\Navbar;
use PHPBootstrap\Render\Html5\Nav\RendererNavbar;

require_once 'tests\RendererTest.php';

/**
 * RendererNavBar test case.
 */
class RendererNavbarTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Navbar('bar');
		$provider[] = array($w, '<div id="bar" class="navbar"><div class="navbar-inner"><div class="container"></div></div></div>');
		
		$w = new Navbar('bar');
		$w->setDisplay(Navbar::FixedBottom);
		$provider[] = array($w, '<div id="bar" class="navbar navbar-fixed-bottom"><div class="navbar-inner"><div class="container"></div></div></div>');
		
		$w = new Navbar('bar');
		$w->setInverse(true);
		$provider[] = array($w, '<div id="bar" class="navbar navbar-inverse"><div class="navbar-inner"><div class="container"></div></div></div>');
		
		$w = new Navbar('bar');
		$w->setContainer(false);
		$provider[] = array($w, '<div id="bar" class="navbar"><div class="navbar-inner"><div class="container-fluid"></div></div></div>');
		
		$w = new Navbar('bar');
		$w->addItem(new NavBrand('teste'), NavItem::Left);
		$provider[] = array($w, '<div id="bar" class="navbar"><div class="navbar-inner"><div class="container"><a href="#" class="brand pull-left">teste</a></div></div></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererNavbar();
	}

}
?>