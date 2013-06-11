<?php
namespace PHPBootstrap\Validate;

/**
 * Validaчуo
 */
abstract class Validate {

	/**
	 * Identificaчуo da validaчуo
	 * 
	 * @var string
	 */
	const IDENTIFY = null;

	/**
	 * Obtem a identificaчуo da validaчуo
	 *
	 * @return string
	 */
	public function getIdentify() {
		return static::IDENTIFY;
	}

	/**
	 * Valida um valor
	 *
	 * @param mixed $value
	 * @return boolean
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	abstract public function valid( $value );

}
?>