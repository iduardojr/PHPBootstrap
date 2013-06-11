<?php
namespace PHPBootstrap\Render\Html5\Slide;

use PHPBootstrap\Widget\Slide\TgSlide;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderiza alternardor de correr
 */
class RendererTgSlide extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgSlide $ui, HtmlNode $node) {
		$node->setAttribute('data-slide' . ( is_int( $ui->getSlide() ) ? '-to' : '' ), $ui->getSlide());
		$node->setAttribute('data-target', '#' . $ui->getTarget()->getIdentify());
	}
	
}
?>