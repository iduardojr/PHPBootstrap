<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Misc\Well;

/**
 * Renderiza envelope
 */
class RendererWell extends RendererWidget {

	// Tag
	const TAGNODE = 'div';
	
	/**
	 *
	 * @see RendererContainer::_render()
	 */
	protected function _render( Well $ui, HtmlNode $node ) {
		$node->addClass('well');
		if ( $ui->getSize() ) {
			$node->addClass($ui->getSize());
		}
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
	}

}
?>