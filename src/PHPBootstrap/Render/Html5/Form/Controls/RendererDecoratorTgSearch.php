<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgSearch;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador de alternador de pesquisa
 */
class RendererDecoratorTgSearch extends RendererDependsResponse {

	/**
	 *
	 * @see RendererInputTgSeek::_render()
	 */
	protected function _render( TgSearch $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'search');
		$node->setAttribute('data-remote', $ui->getAction()->toURI());
		if ( $ui->getQuery() ) {
			$node->setAttribute('data-query', '#' . $ui->getQuery()->getName());
		}
		if ( $ui->getOutput() ) {
			$node->setAttribute('data-output', '#' . $ui->getOutput()->getName());
		}
	}

}
?>