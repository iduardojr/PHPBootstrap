<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\ComboBox;

/**
 * Renderizador de combo
 */
class RendererInputComboBox extends AbstractRendererInputList {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'select';

	/**
	 * 
	 * @see AbstractRendererInputList::_render()
	 */
	protected function _render( ComboBox $ui, HtmlNode $node ) {
		if ( $ui->getDisabled() ) {
			$node->setAttribute('disabled', 'disabled');
		}
		if ( $ui->getForm() ) {
			$node->setAttribute('form', $ui->getForm()->getName());
		}
		if ( $ui->getSpan() ) {
			$node->addClass('span' . $ui->getSpan());
		}
		$node->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$this->toRender($ui->getValidate(), new Context($node));
		$node->setAttribute('data-control', 'ComboBox');
		parent::_render($ui, $node);
	}
	
	/**
	 * 
	 * @see RendererWidget::renderName()
	 */
	protected function renderName( ComboBox $ui, HtmlNode $node ) {
		$node->setAttribute('id', $ui->getName());
		$node->setAttribute('name', $ui->getName());
	}
	
	/**
	 * 
	 * @see AbstractRendererInputList::renderOption()
	 */
	protected function renderOption( ComboBox $ui, $value, $label ) {
		$node = new HtmlNode('option');
		$node->setAttribute('value', $value);
		$options = $ui->getValue();
		if ( ! is_array($options) ) {
			$options = array($options);
		}
		if ( in_array($value, $options) ) {
			$node->setAttribute('selected', 'selected');
		}
		$node->appendNode($label);
		return $node;
	}

}
?>