<?php
use PHPBootstrap\Render\Html5\Colorpicker\RendererColorSuggest;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Colorpicker\ColorSuggest;
use PHPBootstrap\Render\Html5\HtmlNode;

require_once 'tests\RendererTest.php';

/**
 * RendererColorSuggest test case.
 */
class RendererColorSuggestTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('suggest');
		
		$w = new ColorSuggest();
		$provider[] = array($w, '<a href="#" data-provide="colorpicker" data-color-options="{&quot;format&quot;:&quot;hex&quot;}">suggest</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererColorSuggest();
	}

}
?>