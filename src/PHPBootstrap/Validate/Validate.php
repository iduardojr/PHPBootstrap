<?php
namespace PHPBootstrap\Validate;

/**
 * Valida��o
 */
abstract class Validate {

	/**
	 * Identifica��o da valida��o
	 * 
	 * @var string
	 */
	const IDENTIFY = null;

	/**
	 * Obtem a identifica��o da valida��o
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