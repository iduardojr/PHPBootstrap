<?php
namespace PHPBootstrap\Validate\Required;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Requirable;

/**
 * Identico
 */
class EqualTo extends AbstractValidate implements Requirable {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'equalTo';

	/**
	 * Construtor
	 * 
	 * @param Context $context
	 * @param string $message
	 */
	public function __construct( Context $context, $message = null ) {
		$this->context = $context;
		$this->setMessage($message);
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		$value = trim($value);
		$context = trim($this->context->getContextValue());
		return $value == $context;
	}
	
	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	public function getDefaultMessage() {
		return 'invalid value: value "%s" is not equal to "' . $this->context->getContextValue() . '"';
	}

}
?>