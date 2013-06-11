<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Form\Controls\Decorator\TypeHead;

/**
 * Renderizador de TypeHead
 */
class RendererDecoratorTypeHead extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TypeHead $ui, HtmlNode $node ) {
		$node->setAttribute('data-provide', 'typeahead');
		$source = function ( $v ) { return '&quot;'. $v . '&quot;'; };
		$node->setAttribute('data-source', '['. implode(',', array_map( $source, $ui->getSource() ) ) . ']');
		if ( $ui->getItems() ) {
			$node->setAttribute('data-items', $ui->getItems());
		}
		if ( $ui->getMinLength() ) {
			$node->setAttribute('data-min-length', $ui->getMinLength());
		}
	}

}
?>