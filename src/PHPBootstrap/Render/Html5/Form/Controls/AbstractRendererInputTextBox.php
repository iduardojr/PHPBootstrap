<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\AbstractInputTextBox;

/**
 * Renderizador de campo de entrada de texto
 */
abstract class AbstractRendererInputTextBox extends AbstractRendererInputBox {

	/**
	 *
	 * @see AbstractRendererInputBox::_render()
	 */
	protected function _render( AbstractInputTextBox $ui, HtmlNode $node ) {
		if ( $ui->getRounded() ) {
			$node->addClass('search-query');
		}
		parent::_render($ui, $node);
	}

	/**
	 *
	 * @see RendererWidget::createNode()
	 */
	protected function createNode( AbstractInputTextBox $ui ) {
		$node = new HtmlNode('input', true);
		$node->setAttribute('type', constant(get_class($this) . '::INPUT_TYPE'));
		return $node;
	}
	
	

}
?>