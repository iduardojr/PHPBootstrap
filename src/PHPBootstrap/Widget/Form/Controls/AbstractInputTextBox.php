<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\InputInline;

/**
 * Entrada de texto abstrata
 */
abstract class AbstractInputTextBox extends AbstractInputEntry implements InputInline {

	/**
	 * Arredondamento
	 *
	 * @var boolean
	 */
	protected $rounded;
	
	/**
	 * Obtem arredondamento
	 *
	 * @return boolean
	 */
	public function getRounded() {
		return $this->rounded;
	}
	
	/**
	 * Atribui arredondamento
	 *
	 * @param boolean $rounded
	 */
	public function setRounded( $rounded ) {
		$this->rounded = ( bool ) $rounded;
	}

}
?>