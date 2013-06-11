<?php
namespace PHPBootstrap\Render\Html5;

use PHPBootstrap\Render\Render;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Renderer;

abstract class RendererDependsResponse extends Renderer {

	/**
	 *
	 * @see Renderer::render()
	 */
	public function render( Render $ui, Context $context ) {
		if ( ! $context->getResponse() ) {
			throw new \RuntimeException('renderer depends on the context has an response');
		}
		$this->_render($ui, $context->getResponse());
	}

	/**
	 * Template method de render
	 * 
	 * @param Render $ui
	 * @param HtmlNode $node
	 */
	protected function _render( Render $ui, HtmlNode $node ) {
		
	}

}
?>