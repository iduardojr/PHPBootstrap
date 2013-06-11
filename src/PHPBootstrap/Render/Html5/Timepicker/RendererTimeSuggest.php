<?php
namespace PHPBootstrap\Render\Html5\Timepicker;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Timepicker\TimeSuggest;

/**
 * Renderizador de sugestao de hora
 */
class RendererTimeSuggest extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TimeSuggest $ui, HtmlNode $node ) {
		$node->setAttribute('data-provide', 'timepicker');
		RenderHelper::render($ui, $node);
	}
}
?>