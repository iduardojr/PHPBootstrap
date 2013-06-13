<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Patternable;
/**
 * E-mail
 */
class Email extends AbstractValidate implements Patternable {

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