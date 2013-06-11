<?php
namespace PHPBootstrap\Validate\Length\Counter;

/**
 * Contador abstrato
 */
abstract class Counter {

	/**
	 * Identificador do contador
	 *
	 * @return string
	 */
	const IDENTIFY = null;

	/**
	 * Obtem a Identificador do contador
	 *
	 * @return string
	 */
	public function getIdentify() {
		return static::IDENTIFY;
	}

	/**
	 * Conta a quantidade de elementos do valor
	 *
	 * @param mixed $value
	 * @return number
	 * @throws \InvalidArgumentException
	 */
	abstract public function count( $value );

}
?>