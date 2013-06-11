<?php
use PHPBootstrap\Render\Html5\Form\RendererTgFormReset;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\TgFormReset;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgFormReset test case.
 */
class RendererTgFormResetTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('button');
		$node->setAttribute('type', 'button');
		$node->appendNode('toggle');
		
		$w = new TgFormReset(new Form('form'));
		$provider[] = array($w, '<button type="reset" form="form">toggle</button>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgFormReset();
	}
	
}
?>