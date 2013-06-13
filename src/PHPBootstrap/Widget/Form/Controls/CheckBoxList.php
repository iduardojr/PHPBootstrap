<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Ruler\RulerLength;

/**
 * Grupo de caixas de verificaчуo
 */
class CheckBoxList extends AbstractInputListChecked {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.checkboxlist';
	
	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Measurable
	 */
	public function getLength() {
		return $this->validator->getLength();
	}
	
	/**
	 * Atribui validador da quantidade
	 *
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		if ( $rule !== null ) {
			$rule->setRuler(RulerLength::getInstance());
		}
		$this->validator->setLength($rule);
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