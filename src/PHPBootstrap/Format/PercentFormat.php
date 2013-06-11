<?php
namespace PHPBootstrap\Format;

use PHPBootstrap\Format\NumberFormat;

/**
 * Formato percentual
 */
class PercentFormat extends NumberFormat {

	/**
	 * Construtor
	 * 
	 * @param integer $precision
	 * @param string $decimal
	 */
	public function __construct( $precision, $decimal ) {
		parent::__construct($precision, $decimal, '');
	}

	/**
	 *
	 * @see NumberFormat::format()
	 */
	public function format( $value ) {
		if ( is_numeric($value) ) {
			$value = $value * 100;
		}
		return parent::format($value);
	}

	/**
	 *
	 * @see NumberFormat::parse()
	 */
	public function parse( $value ) {
		$value = parent::parse($value);
		if ( $value !== null ) {
			return $value / 100;
		} 
	}

}
?>