<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Form\Controls\Decorator\Searchable;

/**
 * Renderizador de alternador de busca
 */
class AbstractRendererDecoratorSearchable extends RendererDependsResponse {

	/**
	 *
	 * @see RendererToggle::_render()
	 */
	protected function _render( Searchable $ui, HtmlNode $node ) {
		$node->setAttribute('data-remote', $ui->getAction()->toURI());
		if ( $ui->getInputQuery() ) {
			$node->setAttribute('data-input-query', '#' . $ui->getInputQuery()->getName());
		}
	}

}
?>