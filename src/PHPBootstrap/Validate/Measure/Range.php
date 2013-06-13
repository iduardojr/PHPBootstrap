<?php
namespace PHPBootstrap\Validate\Measure;


use PHPBootstrap\Validate\Measure\Ruler\Ruler;
/**
 * Entre Valores
 */
class Range extends AbstractMeasure {
	
	/**
	 * Identificaчуo da validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'range';

	/**
	 * Construtor
	 *
	 * @param string|number $min
	 * @param string|number $max
	 * @param string $message
	 * @param Ruler $ruler
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $min, $max, $message = null, Ruler $ruler = null ) {
		if ( ! ( is_string($min) || is_numeric($min) ) ) {
			throw new \InvalidArgumentException('min is not valid');
		}
		if ( ! ( is_string($max) || is_numeric($max) ) ) {
			throw new \InvalidArgumentException('max is not valid');
		}
		if ( is_numeric($min) && is_numeric($max) && $min >= $max ) {
			throw new \InvalidArgumentException('min is greater max');
		}
		$this->context = array($min, $max);
		$this->setMessage($message);
		$this->setRuler($ruler);
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! $this->ruler && ! $this->isNumeric($value) ) {
			throw new \RuntimeException('no exists ruler for value');
		}
		$min = is_numeric($this->context[0]) ? $this->context[0] : $this->ruler->measure($this->context[0]);
		$max = is_numeric($this->context[1]) ? $this->context[1] : $this->ruler->measure($this->context[1]);
		if ( $min >= $max ) {
			throw new \RuntimeException('min is greater max');
		}
		$value = $this->isNumeric($value) ? $value : $this->ruler->measure($value);
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