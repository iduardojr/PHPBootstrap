<?php
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Dropdown\DropdownDivider;
use PHPBootstrap\Render\Html5\Dropdown\RendererDropdownDivider;

require_once 'tests\RendererTest.php';

/**
 * RendererDropdownDivider test case.
 */
class RendererDropdownDividerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new DropdownDivider();
		$provider[] = array($w, '<li class="divider"></li>', new Context(new HtmlNode('li')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDropdownDivider();
	}

}
?>