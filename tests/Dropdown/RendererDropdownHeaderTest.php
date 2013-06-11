<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Dropdown\DropdownHeader;
use PHPBootstrap\Render\Html5\Dropdown\RendererDropdownHeader;

require_once 'tests\RendererTest.php';

/**
 * RendererDropdownDivider test case.
 */
class RendererDropdownHeaderTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new DropdownHeader('test');
		$provider[] = array($w, '<li class="nav-header">test</li>', new Context(new HtmlNode('li')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDropdownHeader();
	}

}
?>