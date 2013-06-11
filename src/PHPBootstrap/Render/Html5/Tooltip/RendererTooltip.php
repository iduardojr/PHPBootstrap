<?php
namespace PHPBootstrap\Render\Html5\Tooltip;

use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador de dica
 */
class RendererTooltip extends RendererDependsResponse {

	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Tooltip $ui, HtmlNode $node ) {
		$node->setAttribute('rel', 'tooltip');
		
		$node->setAttribute('title', $ui->getTitle());
		
		if ( $ui->getPlacement() ) {
			$node->setAttribute('data-placement', $ui->getPlacement());
		}
		
		if ( ! $ui->getAnimation() ) {
			$node->setAttribute('data-animation', 'false');
		}
		
		if ( $ui->getDelay() ) {
			$node->setAttribute('data-delay', $ui->getDelay());
		}
	}

}
?>