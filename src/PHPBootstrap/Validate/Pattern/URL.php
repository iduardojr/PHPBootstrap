<?php
namespace PHPBootstrap\Validate\Pattern;

/**
 * URL
 */
class Url extends Pattern {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'url';
	
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