<?php
namespace PHPBootstrap\Common;

/**
 * Enumerador
 */
final class Enum {

	/**
	 * Construtor
	 */
	private function __construct() {
	}

	/**
	 * Converte o valor no tipo do enumerador
	 *
	 * @param string|null $value
	 * @param array|object|string $enum
	 * @param string|null $default
	 * @return string|null
	 * @throws \UnexpectedValueException
	 */
	public static function ensure( $value, $enum, $default = null ) {
		if ( $value === null && func_num_args() === 3 ) {
			return $default;
		}
		if ( ! is_array($enum) ) {
			$reflection = new \ReflectionClass($enum);
			$enum = $reflection->getConstants();
			unset($enum['RendererType']);
		}
		$key = array_search(strtolower($value), array_map('strtolower', $enum), true);
		if ( $key === false ) {
			throw new \UnexpectedValueException('value "' . $value . '" not exists in enumerator: ' . implode(', ', $enum));
		}
		return $enum[$key];
	}

}
?>