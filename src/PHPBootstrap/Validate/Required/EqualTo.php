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
	 */
	public function __construct( ContextEqualTo $context ) {
		$this->context = $context;
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

}
?>