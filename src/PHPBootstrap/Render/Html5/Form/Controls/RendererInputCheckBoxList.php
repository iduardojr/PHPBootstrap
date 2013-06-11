<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\CheckBoxList;

/**
 * Renderizador de um grupo de caixa de verificaчуo
 */
class RendererInputCheckBoxList extends AbstractRendererInputListChecked {

	/**
	 * Nome do controle
	 * 
	 * @var string
	 */
	const CONTROL = 'CheckBoxList';
	
	/**
	 * 
	 * @see AbstractRendererInputListChecked::_renderOption()
	 */
	protected function _renderOption( CheckBoxList $ui, HtmlNode $label, HtmlNode $input ) {
		$label->addClass('checkbox');
		$input->setAttribute('type', 'checkbox');
		$input->setAttribute('name', $ui->getName() . '[]');
	}

}
?>