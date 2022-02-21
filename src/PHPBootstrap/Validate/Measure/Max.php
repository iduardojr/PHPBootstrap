<?php
namespace PHPBootstrap\Validate\Measure;

use PHPBootstrap\Validate\Measure\Ruler\Ruler;

/**
 * Maximo
 */
class Max extends AbstractMeasure {

	/**
	 * Identifica��o da valida��o
	 *
	 * @var string
	 */
	const IDENTIFY = 'max';

	/**
	 * Construtor
	 *
	 * @param string|number $max
	 * @param string $message
	 * @param Ruler $ruler
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $max, $message = null, Ruler $ruler = null ) {
		if ( ! ( is_string($max) || is_numeric($max) ) ) {
			throw new \InvalidArgumentException('max is not valid');
		}
		$this->context = $max;
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
		$max = is_numeric($this->context) ? $this->context : $this->ruler->measure($this->context);
		$value = $this->isNumeric($value) ? $value : $this->ruler->measure($value);
		return $value <= $max;
	}
	
	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		return parent::getDefaultMessage() . 'max ' . $this->context;
	}

}
?>