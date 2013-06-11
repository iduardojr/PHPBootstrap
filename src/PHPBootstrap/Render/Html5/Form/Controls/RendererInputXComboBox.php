<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\XComboBox;

/**
 * Renderizador de xcombobox
 */
class RendererInputXComboBox extends RendererWidget {

	/**
	 * Nome da Tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( XComboBox $ui, HtmlNode $node ) {
		$source = function ( $label, $value ) {
			return htmlentities('{"label":"' . $label . '","value":"' . $value . '"}');
		}; 
		$options = array();
		foreach ($ui->getOptions() as $key => $value ) {
			$options[$key] = $value;
		}
		$labels = array_values($options);
		$values = array_keys($options);
		
		$node->addClass('input-append');
		
		$hidden = new HtmlNode('input', true);
		$hidden->setAttribute('type', 'hidden');
		if ( $ui->getName() ) {
			$hidden->setAttribute('name', $ui->getName());
		}
		
		$text = new HtmlNode('input', true);
		$text->setAttribute('type', 'text');
		
		$icon = new HtmlNode('i');
		$icon->addClass($ui->getValue() ? 'icon-remove' : 'icon-chevron-down');
		
		$button = new HtmlNode('button');
		$button->setAttribute('type', 'button');
		$button->addClass('btn');
		$button->appendNode($icon);
		if ( $ui->getButtonStyle() ) {
			$button->addClass($ui->getButtonStyle());
			if ( $ui->getButtonStyle() !== Button::Link ) {
				$icon->addClass('icon-white');
			}
		}
		
		if ( $ui->getValue() ) {
			$hidden->setAttribute('value', $ui->getValue());
			$text->setAttribute('value', $options[$ui->getValue()]);
		}
		
		if ( $ui->getSpan() ) {
			$text->addClass('span' . $ui->getSpan());
		}
		
		if ( $ui->getDisabled() ) {
			$node->addClass('disabled');
			$text->setAttribute('readonly', 'readonly');
			$hidden->setAttribute('disabled', 'disabled');
			$button->setAttribute('disabled', 'disabled');
		}
		
		
		$hidden->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$this->toRender($ui->getValidate(), new Context($hidden));
		
		if ( $ui->getPlaceholder() ) {
			$text->setAttribute('placeholder', $ui->getPlaceholder());
		}
		$text->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$text->setAttribute('data-source', '[' . implode(',', array_map($source, $labels, $values)) . ']');
		$text->setAttribute('data-items', count($labels));
		
		if ( $ui->getForm() ) {
			$hidden->setAttribute('form', $ui->getForm()->getName());
		}
		
		$node->appendNode($text);
		$node->appendNode($hidden);
		$node->appendNode($button);
		
		$node->setAttribute('data-control', 'XComboBox');
	}
	
}
?>