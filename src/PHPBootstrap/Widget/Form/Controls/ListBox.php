<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Ruler\RulerLength;

/**
 * Lista de combinaзгo
 */
class ListBox extends ComboBox {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.listbox';
	
	/**
	 * Nъmero de linhas
	 * 
	 * @var integer
	 */
	protected $rows;
	
	/**
	 * Obtem o nъmero de linhas
	 * 
	 * @return integer
	 */
	public function getRows() {
		return $this->rows;
	}

	/**
	 * Atribui o nъmero de linhas
	 * 
	 * @param integer $rows
	 */
	public function setRows( $rows ) {
		$this->rows = ( int ) $rows > 0 ? $rows : 0;
	}

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