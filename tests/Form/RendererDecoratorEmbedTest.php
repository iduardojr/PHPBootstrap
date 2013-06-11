<?php
use PHPBootstrap\Widget\Form\Controls\Decorator\Embed;

use PHPBootstrap\Widget\Form\Controls\TextBox;
use PHPBootstrap\Widget\Form\Controls\Decorator\AddOn;
use PHPBootstrap\Render\Html5\Form\Controls\RendererDecoratorEmbed;

require_once 'tests\RendererTest.php';


/**
 * RendererDecoratorInput test case.
 */
class RendererDecoratorEmbedTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$input = new TextBox('price');
		
		$w = new Embed($input);
		$provider[] = array($w, '<div><input type="text" id="price" name="price" autocomplete="off" data-control="TextBox"></div>');
		
		$w = new Embed($input);
		$w->append(new AddOn('.00'));
		$provider[] = array($w, '<div class="input-append"><input type="text" id="price" name="price" autocomplete="off" data-control="TextBox"><span class="add-on">.00</span></div>');
		
		$w = new Embed($input);
		$w->prepend(new AddOn('R$'));
		$provider[] = array($w, '<div class="input-prepend"><span class="add-on">R$</span><input type="text" id="price" name="price" autocomplete="off" data-control="TextBox"></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererDecoratorEmbed();
	}

}
?>