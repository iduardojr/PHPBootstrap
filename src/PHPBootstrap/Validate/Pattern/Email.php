<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Patternable;

/**
 * E-mail
 */
class Email extends AbstractValidate implements Patternable {

	/**
	 * Identificação do validação
	 *
	 * @var string
	 */
	const IDENTIFY = 'email';
	
	/**
	 * Construtor
	 *
	 * @param string $message
	 */
	public function __construct( $message = null ) {
		$this->setMessage($message);
	}
	
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