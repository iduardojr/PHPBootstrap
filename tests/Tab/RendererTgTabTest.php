<?php
use PHPBootstrap\Widget\Tab\TgTab;
use PHPBootstrap\Render\Html5\Tab\RendererTgTab;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererTgTab test case.
 */
class RendererTgTabTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('test');
		
		$w = new TgTab(new MockTab());
		$provider[] = array(clone $w, '<a href="#" data-toggle="tab" data-target="#tabbable">test</a>', new Context($node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgTab();
	}

}
?>