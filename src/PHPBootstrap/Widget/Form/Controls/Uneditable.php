<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputInline;

/**
 * Campo de texto não editavel
 */
class Uneditable extends Output implements InputInline, InputPicker {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.output.uneditable';

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->setName($name);
	}
	
	/**
	 *
	 * @see TextEditable::getText()
	 */
	public function getText() {
		return $this->getValue();
	}
	
	/**
	 *
	 * @see TextEditable::setText()
	 */
	public function setText( $text ) {
		return $this->setValue($text);
	}

}
?>