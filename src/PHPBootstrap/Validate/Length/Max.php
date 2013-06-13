<?php
namespace PHPBootstrap\Validate\Length;

use PHPBootstrap\Validate\Length\Counter\Counter;

/**
 * Maximo
 */
class Max extends Length {

	/**
	 * Identificação da validação
	 *
	 * @var string
	 */
	const IDENTIFY = 'max';

	/**
	 * Maximo
	 * 
	 * @var string|number
	 */
	protected $max;

	/**
	 * Construtor
	 *
	 * @param string|number $max
	 * @param Counter $counter
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $max, Counter $counter = null ) {
		if ( ! ( is_string($max) || is_numeric($max) ) ) {
			throw new \InvalidArgumentException('max is not valid');
		}
		$this->max = $max;
		$this->setCounter($counter);
	}

	/**
	 * 
	 * @see Length::getValue()
	 */
	public function getValue() {
		return $this->max;
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! $this->counter && ! $this->isNumeric($value) ) {
			throw new \RuntimeException('no exists counter');
		}
		$max = is_numeric($this->max) ? $this->max : $this->counter->count($this->max);
		$value = $this->isNumeric($value) ? $value : $this->counter->count($value);
		return $value <= $max;
	}
	
	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		return parent::getDefaultMessage() . 'max ' . $this->max;
	}

}
?>