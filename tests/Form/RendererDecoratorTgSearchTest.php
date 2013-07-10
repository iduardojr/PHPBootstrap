<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgSearch;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorTgSearch;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorTgSearch test case.
 */
class RendererDecoratorTgSearchTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('button');
		$node->setAttribute('type', 'button');
		$node->appendNode('toggle');
		
		$w = new TgSearch(new Action('Test'));
		$provider[] = array($w, '<button type="button" data-toggle="search" data-remote="?class=Test">toggle</button>', new Context(clone $node));
		
		$w = new TgSearch(new Action('Test'), new MockEntry());
		$provider[] = array($w, '<button type="button" data-toggle="search" data-remote="?class=Test" data-query="#entry">toggle</button>', new Context(clone $node));
		
		$w = new TgSearch(new Action('Test'), new MockEntry(), new Modal('modal', new Title('title')));
		$provider[] = array($w, '<button type="button" data-toggle="research" data-remote="?class=Test" data-query="#entry" data-output="#modal">toggle</button>', new Context(clone $node));
		
		return $provider;
	}
	
	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorTgSearch();
	}
	
}
?>