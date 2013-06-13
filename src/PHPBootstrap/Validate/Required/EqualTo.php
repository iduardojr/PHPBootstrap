<?php
namespace PHPBootstrap\Validate\Required;

/**
 * Identico
 */
class EqualTo extends Requirable {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'equalTo';

	/**
	 * Construtor
	 * 
	 * @param ContextEqualTo $context
	 * @param string $message
	 */
	public function __construct( ContextEqualTo $context, $message = null ) {
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