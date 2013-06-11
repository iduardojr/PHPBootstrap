<?php
namespace PHPBootstrap\Widget\Form\Controls;

/**
 * Caixa de combinaчуo
 */
class ComboBox extends AbstractInputList {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.combobox';

	/**
	 *
	 * @see AbstractInputList::getContextIdentify()
	 */
	public function getContextIdentify( $value = null ) {
		if ( ! empty($value) && $this->options->containsKey($value) ) {
			return parent::getContextIdentify() . ' option[value="' . $value . '"]:selected';
		}
		return parent::getContextIdentify();  
	}

}
?>