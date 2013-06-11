<?php
namespace PHPBootstrap\Render\Html5\Colorpicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Colorpicker\ColorSuggest;

/**
 * Renderizador de sugestao de cor
 */
class RendererColorSuggest extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( ColorSuggest $ui, HtmlNode $node ) {
		$node->setAttribute('data-provide', 'colorpicker');
		RenderHelper::render($ui, $node);
	}
}
?>