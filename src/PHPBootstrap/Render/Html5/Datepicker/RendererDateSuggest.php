<?php
namespace PHPBootstrap\Render\Html5\Datepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Datepicker\DateSuggest;

/**
 * Renderizador de sugestao de data
 */
class RendererDateSuggest extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( DateSuggest $ui, HtmlNode $node ) {
		$node->setAttribute('data-provide', 'datepicker');
		RenderHelper::render($ui, $node);
	}
}
?>