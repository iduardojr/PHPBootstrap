<?php
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Nav\TabPane;
use PHPBootstrap\Render\Html5\Nav\RendererTabPane;

require_once 'tests\RendererTest.php';

/**
 * RendererTabPane test case.
 */
class RendererTabPaneTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TabPane('teste');
		$provider[] = array($w, '<div><div id="tabpane-004" class="tab-pane">teste</div></div>', new Context(new HtmlNode('div')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTabPane();
	}

}
?>