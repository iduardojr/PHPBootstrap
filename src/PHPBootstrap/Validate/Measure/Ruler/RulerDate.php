<?php
namespace PHPBootstrap\Validate\Measure\Ruler;

use PHPBootstrap\Format\DateFormatter;

/**
 * Regua de data
 */
class RulerDate extends Ruler {

	/**
	 * Identificaчуo do contador
	 *
	 * @var string
	 */
	const IDENTIFY = 'Date';

	/**
	 * Formato da data
	 *
	 * @var DateFormatter
	 */
	protected $format;

	/**
	 * Construtor
	 *
	 * @param DateFormatter $format
	 */
	public function __construct( DateFormatter $format ) {
		$this->format = $format;
	}

	/**
	 * 
	 * @see Ruler::measure()
	 */
	public function measure( $value ) {
		$value = $this->format->parse($value);
		if ( is_string($value) ) {
			return strtotime($value);
		}
		if ( $value instanceof \DateTime ) {
			return $value->getTimestamp();
		}
		if ( is_numeric($value) ) {
			return $value;
		}
		return 0;
	}

}
?>