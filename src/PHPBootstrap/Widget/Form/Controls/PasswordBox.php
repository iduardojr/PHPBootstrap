<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Form;

/**
 * Campo de Entrada de senhas
 */
class PasswordBox extends AbstractInputTextBox {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.passwordbox';

	/**
	 * 
	 * @see AbstractInput::prepare()
	 */
	public function prepare( Form $form ) {
		$this->setValue(null);
		$this->setForm($form);
	}

}
?>