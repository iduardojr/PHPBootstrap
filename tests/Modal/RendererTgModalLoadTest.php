<?php
use PHPBootstrap\Widget\Action\Action;

use PHPBootstrap\Widget\Misc\Title;

use PHPBootstrap\Widget\Modal\Modal;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Modal\TgModalLoad;
use PHPBootstrap\Render\Html5\Modal\RendererTgModalLoad;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgModalLoad test case.
 */
class RendererTgModalLoadTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('Modal');
		
		$w = new TgModalLoad(new Action('Test'), new Modal('modal', new Title('title')));
		$provider[] = array($w, '<a href="?class=Test" target="modal" data-response="html" data-toggle="modal-load">Modal</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgModalLoad();
	}

}
?>