<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Misc\HeroUnit;

/**
 * Renderiza unidade heroi
 */
class RendererHeroUnit extends RendererWidget {
	
	// Tag
	const TAGNODE = 'div';
	
	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( HeroUnit $ui, HtmlNode $node ) {
		$node->addClass('hero-unit');
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
	}
	
}
?>