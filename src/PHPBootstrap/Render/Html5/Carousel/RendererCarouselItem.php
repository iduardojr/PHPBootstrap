<?php
namespace PHPBootstrap\Render\Html5\Carousel;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Carousel\CarouselItem;

/**
 * Renderiza item do carousel
 */
class RendererCarouselItem extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( CarouselItem $ui, HtmlNode $node ) {
		$item = new HtmlNode('div');
		$item->addClass('item');
		if ($ui->getParent() && $ui->getParent()->getActive() === $ui) {
			$item->addClass('active');	
		}
		$this->toRender($ui->getImage(), new Context($item));
		if ( $ui->getCaption() ) {
			$caption = new HtmlNode('div');
			$caption->addClass('carousel-caption');
			$this->toRender($ui->getCaption(), new Context($caption));
			$item->appendNode($caption);
		}
		$node->appendNode($item);
	}

}
?>