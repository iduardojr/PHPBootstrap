<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\Patternable;
use PHPBootstrap\Validate\AbstractValidate;

/**
 * URL
 */
class Url extends AbstractValidate implements Patternable {

	/**
	 * Identificação do validação
	 *
	 * @var string
	 */
	const IDENTIFY = 'url';
	
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
		$flags = array( FILTER_FLAG_SCHEME_REQUIRED, FILTER_FLAG_HOST_REQUIRED );
		return ! ( filter_var($value, FILTER_VALIDATE_URL, $flags) === false );
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not URL valid';
	}

}
?>