<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\AbstractInputChecked;

/**
 * Renderizador de elemento selecionavel
 */
abstract class AbstractRendererInputChecked extends RendererWidget {

	/**
	 * Tag
	 *
	 * @var string
	 */
	const TAGNODE = 'label';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( AbstractInputChecked $ui, HtmlNode $node ) {
		$type = constant(get_class($this) . '::INPUT_TYPE');
		$node->addClass($type);
		if ( $ui->getInline() ) {
			$node->addClass('inline');
		}
		if ( $ui->getSpan() ) {
			$node->addClass('span' . $ui->getSpan());
		}
		
		$input = new HtmlNode('input', true);
		$input->setAttribute('type', $type);
		if ( $ui->getName() ) {
			$input->setAttribute('id', $ui->getName());
			$input->setAttribute('name', $ui->getName());
		}
		
		$input->setAttribute('value', 1);
		if ( $ui->getValue() ) {
			$input->setAttribute('checked', 'checked');
		}
		if ( $ui->getDisabled() ) {
			$input->setAttribute('disabled', 'disabled');
		}
		if ( $ui->getForm() ) {
			$input->setAttribute('form', $ui->getForm()->getName());
		}
		$input->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$this->toRender($ui->getValidate(), new Context($input));
		$input->setAttribute('data-control', constant(get_class($this) . '::CONTROL'));
		$node->appendNode($input);
		$node->appendNode($ui->getLabel());
	}
	
	/**
	 * 
	 * @see RendererWidget::renderName()
	 */
	protected function renderName( AbstractInputChecked $ui, HtmlNode $node) {
		
	}

}
?>