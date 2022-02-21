<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Form\Controls\Decorator\Suggest;

/**
 * Renderizador de sugest�o
 */
class RendererDecoratorSuggest extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Suggest $ui, HtmlNode $node ) {
		$node->setAttribute('data-provide', 'suggest');
		$node->setAttribute('data-source', $ui->getAction()->toURI() );
		if ( $ui->getItems() ) {
			$node->setAttribute('data-items', $ui->getItems());
		}
		if ( $ui->getDelay() ) {
			$node->setAttribute('data-delay', $ui->getDelay());
		}
		if ( $ui->getMinLength() ) {
			$node->setAttribute('data-min-length', $ui->getMinLength());
		}
		if (! $ui->isMatcher()) {
			$node->setAttribute('data-matcher', $ui->isMatcher());
		}
		if (! $ui->isSorter()) {
			$node->setAttribute('data-sorter', $ui->isSorter());
		}
	}

}
?>