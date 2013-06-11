<?php
namespace PHPBootstrap\Validate;

/**
 * Validação
 */
abstract class Validate {

	/**
	 * Identificação da validação
	 * 
	 * @var string
	 */
	const IDENTIFY = null;

	/**
	 * Obtem a identificação da validação
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