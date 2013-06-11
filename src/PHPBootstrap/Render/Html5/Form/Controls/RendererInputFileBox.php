<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\FileBox;

/**
 * Renderizador de file
 */
class RendererInputFileBox extends RendererWidget {

	/**
	 * 
	 * @see RendererWidget::createNode()
	 */
	protected function createNode( FileBox $ui ) {
		$node = new HtmlNode('input', true);
		$node->setAttribute('type', 'file');
		return $node;
	}
	
	/**
	 *
	 * @see RendererWidget::renderName()
	 */
	protected function renderName( FileBox $ui, HtmlNode $node ) {
		$node->setAttribute('id', $ui->getName());
		$node->setAttribute('name', $ui->getName());
	}
	
	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( FileBox $ui, HtmlNode $node ) {
		if ( $ui->getDisabled() ) {
			$node->setAttribute('disabled', 'disabled');
		}
		if ( $ui->getForm() ) {
			$node->setAttribute('form', $ui->getForm()->getName());
		}
		$node->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$this->toRender($ui->getValidate(), new Context($node));
		$node->setAttribute('data-control', 'FileBox');
	}

}
?>