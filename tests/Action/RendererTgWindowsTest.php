<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Action\TgWindows;
use PHPBootstrap\Render\Html5\Action\RendererTgWindows;

require_once 'tests\RendererTest.php';

/**
 * RendererTgWindows test case.
 */
class RendererTgWindowsTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TgWindows(new Action('Test'));
		$provider[] = array( $w, '<a href="?class=Test" target="_blank"></a>', new Context(new HtmlNode('a')) );
		
		$w = new TgWindows(new Action('Test'), 150, 100);
		$provider[] = array( $w, '<a href="?class=Test" target="_blank" data-features="width=150,height=100"></a>', new Context(new HtmlNode('button')) );
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgWindows();
	}

}
?>