<?php
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Render\Html5\Misc\RendererImage;

require_once 'tests\RendererTest.php';

/**
 * RendererImage test case.
 */
class RendererImageTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Image('img/test.jpg');
		$provider[] = array ($w, '<img src="img/test.jpg">');
		
		$w = new Image('img/test.jpg');
		$w->setName('image');
		$provider[] = array ($w, '<img id="image" src="img/test.jpg">');
		
		$w = new Image('img/test.jpg');
		$w->setStyle(Image::Circle);
		$provider[] = array ($w, '<img src="img/test.jpg" class="img-circle">');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererImage();
	}

}
?>