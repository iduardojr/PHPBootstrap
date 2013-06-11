<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Action\TgAjax;
use PHPBootstrap\Render\Html5\Action\RendererTgAjax;

require_once 'tests\RendererTest.php';

/**
 * RendererTgAjax test case.
 */
class RendererTgAjaxTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TgAjax(new Action('Test'), 'entry');
		$provider[] = array($w, '<a href="?class=Test" target="entry" data-response="html"></a>', new Context(new HtmlNode('a')) );
		
		$w = new TgAjax(new Action('Test'), new MockEntry());
		$provider[] = array($w, '<a href="?class=Test" target="entry" data-response="html"></a>', new Context(new HtmlNode('a')) );
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgAjax();
	}

}
?>