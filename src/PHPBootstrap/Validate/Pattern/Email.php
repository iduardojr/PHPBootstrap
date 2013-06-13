<?php
namespace PHPBootstrap\Validate\Pattern;

/**
 * E-mail
 */
class Email extends Pattern {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'email';
	
	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		return !( filter_var($value, FILTER_VALIDATE_EMAIL) === false );
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not e-mail valid';
	}

}
?>