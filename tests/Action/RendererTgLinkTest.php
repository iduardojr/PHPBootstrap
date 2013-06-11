<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Render\Html5\Action\RendererTgLink;

require_once 'tests\RendererTest.php';

/**
 * RendererTgLink test case.
 */
class RendererTgLinkTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new TgLink(new Action('Test'));
		$provider[] = array($w, '<a href="?class=Test"></a>', new Context(new HtmlNode('a')) );
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgLink();
	}

}
?>