<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;

/**
 * Campo selecionavel de entrada abstrato
 */
abstract class AbstractInputChecked extends AbstractInputSpan implements InputQuery {

	/**
	 * Em linha
	 *
	 * @var boolean
	 */
	protected $inline;

	/**
	 * Rotulo
	 *
	 * @var string
	 */
	protected $label;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param string $label
	 */
	public function __construct( $name, $label ) {
		parent::__construct($name);
		$this->setLabel($label);
	}

	/**
	 *
	 * @see AbstractInput::setValue()
	 */
	public function setValue( $value ) {
		$this->value = ( bool ) $value;
	}

	/**
	 * Obtem se é em linha
	 *
	 * @return boolean
	 */
	public function getInline() {
		return $this->inline;
	}

	/**
	 * Atribui em linha
	 *
	 * @param boolean $inline
	 */
	public function setInline( $inline ) {
		$this->inline = ( bool ) $inline;
	}

	/**
	 * Obtem rotulo
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * Atribui rotulo
	 *
	 * @param string $label
	 */
	public function setLabel( $label ) {
		$this->label = $label;
	}

	/**
	 *
	 * @see AbstractInput::getContextIdentify()
	 */
	public function getContextIdentify() {
		return parent::getContextIdentify() . ':checked';
	}

}
?>