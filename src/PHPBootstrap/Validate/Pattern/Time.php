<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Format\TimeFormat;

/**
 * Hora
 */
class Time extends Pattern {
	
	/**
	 * Construtor
	 * 
	 * @param TimeFormat $format
	 * @param string $message
	 */
	public function __construct( TimeFormat $format, $message = null ) {
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
	 * @return TimeFormat
	 */
	public function getFormat() {
		return $this->context;
	}
}
?>