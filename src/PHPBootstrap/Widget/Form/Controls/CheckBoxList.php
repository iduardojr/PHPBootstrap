<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Length\Counter\Length as CounterLength;

/**
 * Grupo de caixas de verificaчуo
 */
class CheckBoxList extends AbstractInputListChecked {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.checkboxlist';
	
	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Length
	 */
	public function getLength() {
		return $this->validator->getLength();
	}
	
	/**
	 * Atribui validador da quantidade
	 *
	 * @param Length $rule
	 * @param string $message
	 */
	public function setLength( Length $rule = null, $message = null ) {
		if ( $rule !== null ) {
			$rule->setCounter(CounterLength::getInstance());
		}
		$this->validator->setLength($rule, $message);
	}

	/**
	 *
	 * @see AbstractInput::setValue()
	 */
	public function setValue( $value ) {
		if ( $value === null || $value == '' ) {
			$value = array();
		} elseif ( ! is_array($value) ) {
			$value = array( $value );
		}
		$value = array_values($value);
		foreach ( $value as $k => $v ) {
			if ( ! is_scalar($v) ) {
				throw new \InvalidArgumentException('value[' . $k . '] is not scalar');
			}
		}
		if ( $this->value !== $value ) {
			$this->valid = null;
			$this->value = $value;
		}
	}

	/**
	 *
	 * @see AbstractInputList::getValue()
	 */
	public function getValue() {
		$values = array();
		foreach ( $this->value as $value ) {
			if ( $this->options->containsKey($value) ) {
				$values[] = $value;
			}
		}
		return $values;
	}

}
?>