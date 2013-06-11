<?php
use PHPBootstrap\Widget\Misc\Icon;

use PHPBootstrap\Render\Html5\Misc\RendererIcon;

require_once 'tests\RendererTest.php';

/**
 * RendererIcon test case.
 */
class RendererIconTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Icon('icon-search');
		$provider[] = array($w, '<i class="icon-search"></i>');
		
		$w = new Icon('icon-search');
		$w->setName('icon');
		$provider[] = array($w, '<i id="icon" class="icon-search"></i>');
		
		$w = new Icon('icon-search');
		$w->setWhite(true);
		$provider[] = array($w, '<i class="icon-search icon-white"></i>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererIcon();
	}

}
?>