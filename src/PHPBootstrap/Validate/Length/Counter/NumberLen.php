<?php
namespace PHPBootstrap\Validate\Length\Counter;

use PHPBootstrap\Format\NumberFormat;

/**
 * Calcula o valor de um numero formatado
 */
class NumberLen extends Counter {

	/**
	 * Identificador do contador
	 *
	 * @return string
	 */
	const IDENTIFY = 'Number';

	/**
	 * Formato do numero
	 * 
	 * @var NumberFormat
	 */
	protected $format;

	/**
	 * Construtor
	 * 
	 * @param NumberFormat $format
	 */
	public function __construct( NumberFormat $format ) {
		$this->format = $format;
	}

	/**
	 *
	 * @see Counter::count()
	 */
	public function count( $value ) {
		$value = $this->format->parse($value);
		if ( is_numeric($value) ) {
			return $value;
		}
	}

}
?>