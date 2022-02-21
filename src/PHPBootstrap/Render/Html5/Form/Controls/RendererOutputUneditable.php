<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Uneditable;

/**
 * Renderizador de campo nao editável
 */
class RendererOutputUneditable extends RendererOutput {

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Uneditable $ui, HtmlNode $node ) {
		$node->addClass('uneditable-input');
		parent::_render($ui, $node);
		$node->removeClass('output');
	}
	
}
?>