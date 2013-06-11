<?php
namespace PHPBootstrap\Validate\Length\Counter;

use PHPBootstrap\Format\DateFormatter;

/**
 * Calcula o timestamp de uma data formatada
 */
class DateLen extends Counter {

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
	 * @see Counter::count()
	 */
	public function count( $value ) {
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