<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Format\DateFormat;

/**
 * Data
 */
class Date extends Pattern {
	
	/**
	 * Construtor
	 * 
	 * @param DateFormat $format
	 * @param string $message
	 */
	public function __construct( DateFormat $format, $message = null ) {
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
	 * @return DateFormat
	 */
	public function getFormat() {
		return $this->context;
	}
}
?>