<?php
use PHPBootstrap\Widget\Misc\Title;

use PHPBootstrap\Render\Context;

use PHPBootstrap\Render\Html5\HtmlNode;

use PHPBootstrap\Render\Html5\Carousel\RendererCarouselItem;
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Carousel\CarouselItem;

require_once 'tests\RendererTest.php';

/**
 * RendererCarouselItem test case.
 */
class RendererCarouselItemTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		
		$w = new CarouselItem(new Image('img/p1.jpg'));
		$provider[] = array($w, '<div><div class="item"><img src="img/p1.jpg"></div></div>', new Context(new HtmlNode('div')));
		
		$w = new CarouselItem(new Image('img/p1.jpg'));
		$w->setCaption(new Title('Teste'));
		$provider[] = array($w, '<div><div class="item"><img src="img/p1.jpg"><div class="carousel-caption"><h1>Teste</h1></div></div></div>', new Context(new HtmlNode('div')));
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererCarouselItem();
	}

}
?>