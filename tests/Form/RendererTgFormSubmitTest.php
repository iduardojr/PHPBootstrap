<?php
use PHPBootstrap\Widget\Action\Action;

use PHPBootstrap\Render\Html5\Form\RendererTgFormSubmit;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\TgFormSubmit;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgFormSubmit test case.
 */
class RendererTgFormSubmitTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('button');
		$node->setAttribute('type', 'button');
		$node->appendNode('toggle');
		
		$w = new TgFormSubmit(new Action('Test'), new Form('form'));
		$provider[] = array($w, '<button type="submit" form="form" formaction="?class=Test">toggle</button>', new Context(clone $node));
		
		$w = new TgFormSubmit(new Action('Test'), new Form('form'), false);
		$provider[] = array($w, '<button type="submit" form="form" formaction="?class=Test" formnovalidate="formnovalidate">toggle</button>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgFormSubmit();
	}
	
}
?>