<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\AbstractInputListChecked;

/**
 * Renderizador de um lista de opчѕes selecionaveis
 */
abstract class AbstractRendererInputListChecked extends AbstractRendererInputList {

	/**
	 * Nome da Tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see AbstractRendererInputList::_render()
	 */
	protected function _render( AbstractInputListChecked $ui, HtmlNode $node ) {
		$control = constant(get_class($this) . '::CONTROL');
		if ( $ui->getSpan() && ! $ui->getInline() ) {
			$node->addClass('span' . $ui->getSpan());
		}
		parent::_render($ui, $node);
		$labels = $node->getAllNodes();
		if ( ! empty($labels) ) {
			$labelNodes = $labels[0]->getAllNodes();
			$this->toRender($ui->getValidate(), new Context($labelNodes[0]));
		}
		$node->setAttribute('data-control', $control);
	}

	/**
	 *
	 * @see RendererInputAbstractGroupSelectable::renderOption()
	 */
	protected function renderOption( AbstractInputListChecked $ui, $value, $label ) {
		$node = new HtmlNode('label');
		$input = new HtmlNode('input', true);
		$this->_renderOption($ui, $node, $input);
		$input->setAttribute('value', $value);
		$checked = $ui->getValue();
		if ( ! is_array($checked) ) {
			$checked = array( $checked );
		}
		if ( in_array($value, $checked) ) {
			$input->setAttribute('checked', 'checked');
		}
		if ( $ui->getInline() ) {
			$node->addClass('inline');
			if ( $ui->getSpan() ) {
				$node->addClass('span' . $ui->getSpan());
			}
		}
		if ( $ui->getDisabled() ) {
			$input->setAttribute('disabled', 'disabled');
		}
		if ( $ui->getForm() ) {
			$input->setAttribute('form', $ui->getForm()->getName());
		}
		$input->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		
		$node->appendNode($input);
		$node->appendNode($label);
		
		return $node;
	}

	/**
	 * Complementa a renderizaчуo da opчуo
	 *
	 * @param AbstractInputListChecked $ui
	 * @param HtmlNode $label
	 * @param HtmlNode $input
	 */
	protected function _renderOption( AbstractInputListChecked $ui, HtmlNode $label, HtmlNode $input ) {
	}

}
?>