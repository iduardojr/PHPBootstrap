<?php
namespace PHPBootstrap\Validate\Length;

use PHPBootstrap\Validate\Length\Counter\Counter;

/**
 * Minimo
 */
class Min extends Length {

	/**
	 * Identificaчуo da validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'min';

	/**
	 * Minimo
	 * 
	 * @var string|number
	 */
	protected $min;

	/**
	 * Construtor
	 *
	 * @param string|number $min
	 * @param Counter $counter
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $min, Counter $counter = null ) {
		if ( ! ( is_string($min) || is_numeric($min) ) ) {
			throw new \InvalidArgumentException('min is not valid');
		}
		$this->min = $min;
		$this->setCounter($counter);
	}

	/**
	 * 
	 * @see Length::getValue()
	 */
	public function getValue() {
		return $this->min;
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! $this->counter && ! $this->isNumeric($value) ) {
			throw new \RuntimeException('no exists counter for value');
		}
		$min = is_numeric($this->min) ? $this->min : $this->counter->count($this->min);
		$value = $this->isNumeric($value) ? $value : $this->counter->count($value);
		return $value >= $min;
	}
	
	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		return parent::getDefaultMessage() . 'min ' . $this->min;
	}
	
}
?>