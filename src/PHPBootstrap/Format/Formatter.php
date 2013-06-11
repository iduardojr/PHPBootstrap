<?php
namespace PHPBootstrap\Format;

/**
 * Interface de formatador
 */
interface Formatter {

	/**
	 * Formata um valor
	 *
	 * @param mixed $value
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function format( $value );

	/**
	 * Converte um valor
	 *
	 * @param string $value
	 * @return mixed
	 * @throws \InvalidArgumentException
	 */
	public function parse( $value );

	/**
	 * Obtem a expressão regular do formato
	 *
	 * @return string
	 */
	public function regex();

}
?>