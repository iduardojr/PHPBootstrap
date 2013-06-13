<?php
namespace PHPBootstrap\Validate\Measure\Ruler;

/**
 * Regua abstrata
 */
abstract class Ruler {

	/**
	 * Identificador
	 *
	 * @return string
	 */
	const IDENTIFY = null;

	/**
	 * Obtem o identificador
	 *
	 * @return string
	 */
	public function getIdentify() {
		return static::IDENTIFY;
	}

	/**
	 * Medi o valor
	 *
	 * @param mixed $value
	 * @return number
	 * @throws \InvalidArgumentException
	 */
	abstract public function measure( $value );

}
?>