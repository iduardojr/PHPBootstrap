<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Dropdown\Dropdown;
use PHPBootstrap\Widget\Dropdown\TgDropdown;
use PHPBootstrap\Render\Html5\Dropdown\RendererTgDropdown;

require_once 'tests\RendererTest.php';

/**
 * RendererTgDropdown test case.
 */
class RendererTgDropdownTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('Dropdown');
		
		$w = new TgDropdown(new Dropdown());
		$provider[] = array($w, '<div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<span class="caret"></span></a><ul class="dropdown-menu"></ul></div>', new Context(clone $node));
		
		$w = new TgDropdown(new Dropdown());
		$w->setCaret(false);
		$provider[] = array($w, '<div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a><ul class="dropdown-menu"></ul></div>', new Context(clone $node));
		
		$w = new TgDropdown(new Dropdown());
		$w->setDropup(true);
		$provider[] = array($w, '<div class="dropup"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<span class="caret"></span></a><ul class="dropdown-menu"></ul></div>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgDropdown();
	}

}
?>