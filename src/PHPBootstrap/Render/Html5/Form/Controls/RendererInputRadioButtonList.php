<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\RadioButtonList;

/**
 * Renderizador de um grupo de caixa de seleחדo
 */
class RendererInputRadioButtonList extends AbstractRendererInputListChecked {
	
	/**
	 * Nome do controle
	 *
	 * @var string
	 */
	const CONTROL = 'RadioButtonList';
	
	/**
	 * 
	 * @see AbstractRendererInputListChecked::_renderOption()
	 */
	protected function _renderOption( RadioButtonList $ui, HtmlNode $label, HtmlNode $input ) {
		$label->addClass('radio');
		$input->setAttribute('type', 'radio');
		$input->setAttribute('name', $ui->getName());
	}

}
?>