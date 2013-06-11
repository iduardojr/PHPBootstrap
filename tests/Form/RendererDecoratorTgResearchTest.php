<?php
use PHPBootstrap\Widget\Action\Action;

use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgResearch;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorTgResearch;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorTgResearch test case.
 */
class RendererDecoratorTgResearchTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('button');
		$node->setAttribute('type', 'button');
		$node->appendNode('toggle');
		
		$w = new TgResearch(new Action('Test'), new Modal('modal', new Title('title')));
		$provider[] = array($w, '<button type="button" data-toggle="research" data-remote="?class=Test" data-target="#modal">toggle</button>', new Context(clone $node));
		
		$w = new TgResearch(new Action('Test'), new Modal('modal', new Title('title')), new MockEntry());
		$provider[] = array($w, '<button type="button" data-toggle="research" data-remote="?class=Test" data-input-query="#entry" data-target="#modal">toggle</button>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorTgResearch();
	}
	
}
?>