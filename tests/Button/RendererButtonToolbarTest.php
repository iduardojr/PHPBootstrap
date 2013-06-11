<?php
use PHPBootstrap\Widget\Button\ButtonGroup;
use PHPBootstrap\Render\Html5\Button\RendererButtonToolbar;
use PHPBootstrap\Widget\Button\ButtonToolbar;

require_once 'tests\RendererTest.php';

/**
 * RendererButtonToolbar test case.
 */
class RendererButtonToolbarTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new ButtonToolbar('toolbar');
		$provider[] = array($w, '<div id="toolbar" class="btn-toolbar"></div>');
		
		$w = new ButtonToolbar('toolbar');
		$w->addButtonGroup(new ButtonGroup());
		$provider[] = array($w, '<div id="toolbar" class="btn-toolbar"><div class="btn-group"></div></div>');
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererButtonToolbar();
	}

}
?>