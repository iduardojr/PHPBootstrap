<?php
namespace PHPBootstrap\Validate\Measure\Ruler;

use PHPBootstrap\Format\NumberFormat;

/**
 * Regua de numero 
 */
class RulerNumber extends Ruler {

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
	 * @see Ruler::measure()
	 */
	public function measure( $value ) {
		$value = $this->format->parse($value);
		if ( is_numeric($value) ) {
			return $value;
		}
	}

}
?>