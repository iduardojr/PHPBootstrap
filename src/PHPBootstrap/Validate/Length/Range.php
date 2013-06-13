<?php
namespace PHPBootstrap\Validate\Length;

use PHPBootstrap\Validate\Length\Counter\Counter;

/**
 * Entre Valores
 */
class Range extends Length {
	
	/**
	 * Identificaчуo da validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'range';

	/**
	 * Minimo
	 * 
	 * @var string|number
	 */
	protected $min;
	
	/**
	 * Maximo
	 *
	 * @var string|number
	 */
	protected $max;

	/**
	 * Construtor
	 *
	 * @param string|number $min
	 * @param string|number $max
	 * @param Counter $counter
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $min, $max, Counter $counter = null ) {
		if ( ! ( is_string($min) || is_numeric($min) ) ) {
			throw new \InvalidArgumentException('min is not valid');
		}
		if ( ! ( is_string($max) || is_numeric($max) ) ) {
			throw new \InvalidArgumentException('max is not valid');
		}
		if ( is_numeric($min) && is_numeric($max) && $min >= $max ) {
			throw new \InvalidArgumentException('min is greater max');
		}
		$this->min = $min;
		$this->max = $max;
		$this->setCounter($counter);
	}

	/**
	 * Obtem o valor de minimo e maximo
	 * 
	 * @return array
	 */
	public function getParameter() {
		return array($this->min, $this->max);
	}
	
	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! $this->counter && ! $this->isNumeric($value) ) {
			throw new \RuntimeException('no exists counter');
		}
		$min = is_numeric($this->min) ? $this->min : $this->counter->count($this->min);
		$max = is_numeric($this->max) ? $this->max : $this->counter->count($this->max);
		if ( $min >= $max ) {
			throw new \RuntimeException('min is greater max');
		}
		$value = $this->isNumeric($value) ? $value : $this->counter->count($value);
		return $value >= $min && $max >= $value;
	}

	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		return parent::getDefaultMessage() . 'between ' . $this->min . ' and ' . $this->max;
	}
}
?>