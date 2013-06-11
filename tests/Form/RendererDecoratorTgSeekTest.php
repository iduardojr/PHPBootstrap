<?php
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgSeek;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorTgSeek;

require_once 'tests\RendererTest.php';

/**
 * RendererDecoratorTgSeek test case.
 */
class RendererDecoratorTgSeekTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('button');
		$node->setAttribute('type', 'button');
		$node->appendNode('toggle');
		
		$w = new TgSeek(new Action('Test'));
		$provider[] = array( $w, '<button type="button" data-toggle="seek" data-remote="?class=Test">toggle</button>', new Context(clone $node) );
		
		$w = new TgSeek(new Action('Test'), new MockEntry());
		$provider[] = array( $w, '<button type="button" data-toggle="seek" data-remote="?class=Test" data-input-query="#entry">toggle</button>', new Context(clone $node) );
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorTgSeek();
	}

}
?>