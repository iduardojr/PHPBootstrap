<?php
namespace PHPBootstrap\Render\Html5\Carousel;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Slide\TgSlide;
use PHPBootstrap\Widget\Carousel\Carousel;

/**
 * Renderiza carousel
 */
class RendererCarousel extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Carousel $ui, HtmlNode $node ) {
		$node->addClass('carousel');
		$node->addClass('slide');
		
		if ( $ui->getInterval() ) {
			$node->setAttribute('data-interval', $ui->getInterval());
		}
		
		if ( ! $ui->getPause() ) {
			$node->setAttribute('data-pause', '');
		}
		
		$indicators = new HtmlNode('ol');
		$indicators->addClass('carousel-indicators');
		if ( $ui->getIndicators() ) {
			$node->appendNode($indicators);
		}
		
		$inner = new HtmlNode('div');
		$inner->addClass('carousel-inner');
		$node->appendNode($inner);
		
		foreach ( $ui->getItems() as $to => $item ) {
			$this->toRender($item, new Context($inner));
			$li = new HtmlNode('li');
			if ( $ui->getActive() === $item) {
				$li->addClass('active');
			}
			$this->toRender(new TgSlide($ui, $to), new Context($li));
			$indicators->appendNode($li);
		}
		
		if ( $ui->getPrev() ) {
			$li = new HtmlNode('a');
			$li->setAttribute('href', '#');
			$li->addClass('carousel-control');
			$li->addClass('left');
			$li->appendNode('&lsaquo;');
			$this->toRender(new TgSlide($ui, TgSlide::Prev), new Context($li));
			$node->appendNode($li);
		}
		
		if ( $ui->getNext() ) {
			$li = new HtmlNode('a');
			$li->setAttribute('href', '#');
			$li->addClass('carousel-control');
			$li->addClass('right');
			$li->appendNode('&rsaquo;');
			$this->toRender(new TgSlide($ui, TgSlide::Next), new Context($li));
			$node->appendNode($li);
		}
	}

}
?>