<?php
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Carousel\CarouselItem;
use PHPBootstrap\Widget\Carousel\Carousel;
use PHPBootstrap\Render\Html5\Carousel\RendererCarousel;

require_once 'tests\RendererTest.php';

/**
 * RendererCarousel test case.
 */
class RendererCarouselTest extends RendererTest {

	/**
	 *
	 * @see RendererTest::provider()
	 */
	public function provider() {
		$w = new Carousel('carousel');
		$provider[] = array($w, '<div id="carousel" class="carousel slide"><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a href="#" class="carousel-control left" data-slide="prev" data-target="#carousel">&lsaquo;</a><a href="#" class="carousel-control right" data-slide="next" data-target="#carousel">&rsaquo;</a></div>');
		
		$w = new Carousel('carousel');
		$w->setInterval(3000);
		$provider[] = array($w, '<div id="carousel" class="carousel slide" data-interval="3000"><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a href="#" class="carousel-control left" data-slide="prev" data-target="#carousel">&lsaquo;</a><a href="#" class="carousel-control right" data-slide="next" data-target="#carousel">&rsaquo;</a></div>');
		
		$w = new Carousel('carousel');
		$w->setPause(false);
		$provider[] = array($w, '<div id="carousel" class="carousel slide" data-pause=""><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a href="#" class="carousel-control left" data-slide="prev" data-target="#carousel">&lsaquo;</a><a href="#" class="carousel-control right" data-slide="next" data-target="#carousel">&rsaquo;</a></div>');
		
		$w = new Carousel('carousel');
		$w->setNext(false);
		$provider[] = array($w, '<div id="carousel" class="carousel slide"><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a href="#" class="carousel-control left" data-slide="prev" data-target="#carousel">&lsaquo;</a></div>');
		
		$w = new Carousel('carousel');
		$w->setPrev(false);
		$provider[] = array($w, '<div id="carousel" class="carousel slide"><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a href="#" class="carousel-control right" data-slide="next" data-target="#carousel">&rsaquo;</a></div>');
		
		$w = new Carousel('carousel');
		$w->addItem(new CarouselItem(new Image('img/p1.jpg')));
		$provider[] = array($w, '<div id="carousel" class="carousel slide"><ol class="carousel-indicators"><li class="active" data-slide-to="0" data-target="#carousel"></li></ol><div class="carousel-inner"><div class="item active"><img src="img/p1.jpg"></div></div><a href="#" class="carousel-control left" data-slide="prev" data-target="#carousel">&lsaquo;</a><a href="#" class="carousel-control right" data-slide="next" data-target="#carousel">&rsaquo;</a></div>');
		
		$w = new Carousel('carousel');
		$w->setIndicators(false);
		$provider[] = array($w, '<div id="carousel" class="carousel slide"><div class="carousel-inner"></div><a href="#" class="carousel-control left" data-slide="prev" data-target="#carousel">&lsaquo;</a><a href="#" class="carousel-control right" data-slide="next" data-target="#carousel">&rsaquo;</a></div>');
		
		return $provider;
	}

	/**
	 *
	 * @see RendererTest::create()
	 */
	public function create() {
		return new RendererCarousel();
	}

}
?>