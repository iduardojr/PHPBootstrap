<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Modal\TgModalClose;
use PHPBootstrap\Render\Html5\Modal\RendererTgModalClose;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgModalClose test case.
 */
class RendererTgModalCloseTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('Modal');
		
		$w = new TgModalClose();
		$provider[] = array($w, '<a href="#" data-dismiss="modal">Modal</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgModalClose();
	}

}
?>