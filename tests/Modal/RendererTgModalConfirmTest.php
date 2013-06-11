<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Modal\TgModalConfirm;
use PHPBootstrap\Render\Html5\Modal\RendererTgModalConfirm;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgModalConfirm test case.
 */
class RendererTgModalConfirmTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('Modal');
		
		$w = new TgModalConfirm();
		$provider[] = array($w, '<a href="#" data-dismiss="confirm">Modal</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgModalConfirm();
	}

}
?>