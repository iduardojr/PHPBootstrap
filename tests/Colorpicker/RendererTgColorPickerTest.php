<?php
use PHPBootstrap\Widget\Colorpicker\TgColorPicker;
use PHPBootstrap\Render\Html5\Colorpicker\RendererTgColorPicker;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;

require_once 'tests\RendererTest.php';

/**
 * RendererTgColorPicker test case.
 */
class RendererTgColorPickerTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		$node->appendNode('toggle');
		
		$w = new TgColorPicker();
		$provider[] = array($w, '<a href="#" data-toggle="colorpicker" data-color-options="{&quot;format&quot;:&quot;hex&quot;}">toggle</a>', new Context(clone $node));
		
		$w = new TgColorPicker();
		$w->setDefaultValue('#fff');
		$provider[] = array($w, '<a href="#" data-toggle="colorpicker" data-color="#fff" data-color-options="{&quot;format&quot;:&quot;hex&quot;}">toggle</a>', new Context(clone $node));
		
		$w = new TgColorPicker();
		$w->setTarget(new MockEntry());
		$provider[] = array($w, '<a href="#" data-toggle="colorpicker" data-target="#entry" data-color-options="{&quot;format&quot;:&quot;hex&quot;}">toggle</a>', new Context(clone $node));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererTgColorPicker();
	}

}
?>