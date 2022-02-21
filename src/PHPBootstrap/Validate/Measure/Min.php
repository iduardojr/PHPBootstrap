<?php
namespace PHPBootstrap\Validate\Measure;

use PHPBootstrap\Validate\Measure\Ruler\Ruler;

/**
 * Minimo
 */
class Min extends AbstractMeasure {

	/**
	 * Identifica��o da valida��o
	 *
	 * @var string
	 */
	const IDENTIFY = 'min';

	/**
	 * Construtor
	 *
	 * @param string|number $min
	 * @param string $message
	 * @param Ruler $ruler
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $min, $message = null, Ruler $ruler = null ) {
		if ( ! ( is_string($min) || is_numeric($min) ) ) {
			throw new \InvalidArgumentException('min is not valid');
		}
		$this->context = $min;
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
		$min = is_numeric($this->context) ? $this->context : $this->ruler->measure($this->context);
		$value = $this->isNumeric($value) ? $value : $this->ruler->measure($value);
		return $value >= $min;
	}
	
	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		return parent::getDefaultMessage() . 'min ' . $this->context;
	}
	
}
?>