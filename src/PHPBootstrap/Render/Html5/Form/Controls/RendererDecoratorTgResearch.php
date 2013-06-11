<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgResearch;

/**
 * Renderizador de alternador de pesquisa
 */
class RendererDecoratorTgResearch extends AbstractRendererDecoratorSearchable {

	/**
	 *
	 * @see RendererInputTgSeek::_render()
	 */
	protected function _render( TgResearch $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'research');
		parent::_render($ui, $node);
		$node->setAttribute('data-target', '#' . $ui->getOutputModal()->getName());
	}

}
?>