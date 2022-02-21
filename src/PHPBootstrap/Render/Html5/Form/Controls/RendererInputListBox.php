<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\ListBox;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de lista
 */
class RendererInputListBox extends RendererInputComboBox {
	
	/**
	 * 
	 * @see RendererInputComboBox::_render()
	 */
	protected function _render( ListBox $ui, HtmlNode $node ) {
		$node->setAttribute('multiple', 'multiple');
		if ( $ui->getRows() ) {
			$node->setAttribute('size', $ui->getRows());
		}
		parent::_render($ui, $node);
		$node->setAttribute('data-control', 'ListBox');
	}
	
	/**
	 * 
	 * @see RendererInputComboBox::renderName()
	 */
	protected function renderName( ListBox $ui, HtmlNode $node ) {
		$node->setAttribute('id', $ui->getName());
		$node->setAttribute('name', $ui->getName() . '[]');
	}
}
?>