<?php
use PHPBootstrap\Render\Html5\Form\RendererTgFormClear;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\TgFormClear;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgFormClear test case.
 */
class RendererTgFormClearTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('button');
		$node->setAttribute('type', 'button');
		$node->appendNode('toggle');
		
		$w = new TgFormClear(new Form('form'));
		$provider[] = array($w, '<button type="button" form="form" data-toggle="clear">toggle</button>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgFormClear();
	}
	
}
?>