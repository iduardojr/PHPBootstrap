<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\AbstractInputBox;
use PHPBootstrap\Widget\Form\TextEditable;

/**
 * Renderizador de caixa de entrada
 */
abstract class AbstractRendererInputBox extends RendererWidget {

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( AbstractInputBox $ui, HtmlNode $node ) {
		$this->renderValue($ui, $node);
		$this->renderSize($ui, $node);
		if ( $ui->getDisabled() ) {
			$node->setAttribute('readonly', 'readonly');
		}
		if ( $ui->getPlaceholder() ) {
			$node->setAttribute('placeholder', $ui->getPlaceholder());
		}
		if ( $ui->getForm() ) {
			$node->setAttribute('form', $ui->getForm()->getName());
		}
		$node->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$this->toRender($ui->getValidate(), new Context($node));
		$node->setAttribute('data-control', constant(get_class($this) . '::CONTROL'));
	}

	/**
	 *
	 * @see RendererWidget::renderName()
	 */
	protected function renderName( AbstractInputBox $ui, HtmlNode $node ) {
		$node->setAttribute('id', $ui->getName());
		$node->setAttribute('name', $ui->getName());
	}

	/**
	 * Renderiza o valor
	 *
	 * @param AbstractInputBox $ui
	 * @param HtmlNode $node
	 */
	protected function renderValue( AbstractInputBox $ui, HtmlNode $node ) {
		$node->setAttribute('value', $ui instanceof TextEditable ? $ui->getText() : $ui->getValue());
	}

	/**
	 * Renderiza o tamanho
	 * 
	 * @param AbstractInputBox $ui
	 * @param HtmlNode $node
	 */
	protected function renderSize( AbstractInputBox $ui, HtmlNode $node ) {
		if ( $ui->getSpan() ) {
			$node->addClass('span' . $ui->getSpan());
		}
	}

}
?>