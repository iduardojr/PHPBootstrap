<?php
namespace PHPBootstrap\Validate\Pattern;

/**
 * Expressуo Regular
 */
class Regex extends Pattern {

	/**
	 * Identificaчуo do validaчуo
	 *
	 * @var string
	 */
	const IDENTIFY = 'pattern';

	/**
	 * Digitos
	 *
	 * @var string
	 */
	const PATTERN_DIGITS = '/^[0-9]+$/';

	/**
	 * Inteiro
	 *
	 * @var string
	 */
	const PATTERN_INTEGER = '/^-?([0-9]+(\.0+)?|[0-9]{1,3}(\,[0-9]{3})+)$/';

	/**
	 * Numero
	 *
	 * @var string
	 */
	const PATTERN_NUMBER = '/^-?([0-9]+|([1-9][0-9]{0,2}(\,[0-9]{3})+))(\.[0-9]+)?$/';

	/**
	 * Telefone BR
	 *
	 * @var string
	 */
	const PATTERN_PHONE_BR = '/^\([1-9][0-9]\)\s[1-9][0-9]{3}-[0-9]{4}$/';
	
	/**
	 * Cep BR
	 *
	 * @var string
	 */
	const PATTERN_ZIPCODE_BR = '/^[0-9]{2}\.?[0-9]{3}-[0-9]{3}$/';

	/**
	 * Data BR
	 *
	 * @var string
	 */
	const PATTERN_DATE_BR = '/^[0-3]?[0-9]\/[0-1]?[0-9]\/[0-9]{4}$/';

	/**
	 * Hora 12h
	 *
	 * @var string
	 */
	const PATTERN_TIME_12H = '/^((0?[1-9]|1[012])(:[0-5]\d){0,2}(\s[AP]M))$/i';

	/**
	 * Hora 24h
	 *
	 * @var string
	 */
	const PATTERN_TIME_24H = '/^([0-1]\d|2[0-3]):([0-5]\d)$/';

	/**
	 * Letras, espaco e _
	 *
	 * @var string
	 */
	const PATTERN_ALPHA = '/^[[:alpha:]\s_]*$/';

	/**
	 * Letras, numeros, espaco e _
	 *
	 * @var string
	 */
	const PATTERN_ALNUM = '/^[[:alnum:]\s_]*$/';

	/**
	 * Somente letras
	 *
	 * @var string
	 */
	const PATTERN_LETTERS_ONLY = '/^[a-zA-Z]+$/';

	/**
	 * Padrуo
	 *
	 * @var string
	 */
	protected $pattern;

	/**
	 * Construtor
	 *
	 * @param string $pattern
	 */
	public function __construct( $pattern ) {
		$this->pattern = $pattern;
	}

	/**
	 * 
	 * @see Pattern::getPattern()
	 */
	public function getPattern() {
		return $this->pattern;
	}

	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		return preg_match($this->pattern, $value) > 0;
	}
	
	/**
	 * Digitos
	 *
	 * @return Regex
	 */
	public static function digits() {
		return new Regex(self::PATTERN_DIGITS);
	}
	
	/**
	 * Inteiro
	 *
	 * @return Regex
	 */
	public static function integer() {
		return new Regex(self::PATTERN_INTEGER);
	}
	
	/**
	 * Numero
	 *
	 * @return Regex
	 */
	public static function number() {
		return new Regex(self::PATTERN_NUMBER);
	}
	
	/**
	 * Telefone BR
	 *
	 * @return Regex
	 */
	public static function phoneBR() {
		return new Regex(self::PATTERN_PHONE_BR);
	}
	
	/**
	 * CEP BR
	 *
	 * @return Regex
	 */
	public static function zipcodeBR() {
		return new Regex(self::PATTERN_ZIPCODE_BR);
	}
	
	/**
	 * Date BR
	 *
	 * @return Regex
	 */
	public static function dateBR() {
		return new Regex(self::PATTERN_DATE_BR);
	}
	
	/**
	 * Hora 12h
	 *
	 * @return Regex
	 */
	public static function time12h() {
		return new Regex(self::PATTERN_TIME_12H);
	}
	
	/**
	 * Hora 24h
	 *
	 * @return Regex
	 */
	public static function time24h() {
		return new Regex(self::PATTERN_TIME_24H);
	}
	
	/**
	 * Letras, espaco e _
	 *
	 * @return Regex
	 */
	public static function alpha() {
		return new Regex(self::PATTERN_ALPHA);
	}
	
	
	/**
	 * Letras, numeros, espaco e _
	 *
	 * @return Regex
	 */
	public static function alnum() {
		return new Regex(self::PATTERN_ALNUM);
	}
	
	/**
	 * Somente letras
	 *
	 * @return Regex
	 */
	public static function lettersOnly() {
		return new Regex(self::PATTERN_LETTERS_ONLY);
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not regex valid';
	}

}
?>