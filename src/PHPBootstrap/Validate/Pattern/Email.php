<?php
namespace PHPBootstrap\Validate\Pattern;

/**
 * E-mail
 */
class Email extends Pattern {

	/**
	 * Identifica��o do valida��o
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

}
?>