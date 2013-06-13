<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Format\NumberFormat;

/**
 * Numero
 */
class Number extends Pattern {
	
	/**
	 * Construtor
	 * 
	 * @param NumberFormat $format
	 * @param string $message
	 */
	public function __construct( NumberFormat $format, $message = null ) {
		$this->context = $format;
		$this->message;
	}
	
	/**
	 * @see AbstractValidate::getContext()
	 */
	public function getContext() {
		return $this->context->regex();
	}
	
	/**
	 * Obtem formato
	 * 
	 * @return NumberFormat
	 */
	public function getFormat() {
		return $this->context;
	}
}
?>