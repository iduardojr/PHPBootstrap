<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\Patternable;
use PHPBootstrap\Validate\AbstractValidate;

/**
 * Expressуo Regular
 */
class Pattern extends AbstractValidate implements Patternable {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'pattern';

	// PATTERN
	const Digits= '/^[0-9]+$/';
	const Integer = '/^-?([0-9]+(\.0+)?|[0-9]{1,3}(\,[0-9]{3})+)$/';
	const Number = '/^-?([0-9]+|([1-9][0-9]{0,2}(\,[0-9]{3})+))(\.[0-9]+)?$/';
	const PhoneBR = '/^\([1-9][0-9]\)\s[1-9][0-9]{3}-[0-9]{4}$/';
	const ZipCodeBR = '/^[0-9]{2}\.?[0-9]{3}-[0-9]{3}$/';
	const DateBR = '/^[0-3]?[0-9]\/[0-1]?[0-9]\/[0-9]{4}$/';
	const Time12H = '/^((0?[1-9]|1[012])(:[0-5]\d){0,2}(\s[AP]M))$/i';
	const Time24H = '/^([0-1]\d|2[0-3]):([0-5]\d)$/';
	const Alpha = '/^[[:alpha:]\s_]*$/';
	const Alnum = '/^[[:alnum:]\s_]*$/';
	const LettersOnly = '/^[a-zA-Z]+$/';

	/**
	 * Construtor
	 *
	 * @param string $pattern
	 */
	public function __construct( $pattern ) {
		$this->context = $pattern;
	}

	/**
	 * @see AbstractValidate::valid()
	 */
	public function valid( $value ) {
		return preg_match($this->context, $value) > 0;
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not pattern valid';
	}

}
?>