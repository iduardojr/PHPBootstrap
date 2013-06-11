<?php
namespace PHPBootstrap\Common;

/**
 * Interface de uma cole��o
 */
interface Collection extends \IteratorAggregate, \Countable {

	/**
	 * Verifica se a cole��o � vazia
	 *
	 * @return boolean
	 */
	public function isEmpty();

	/**
	 * Limpa a cole��o
	 */
	public function clear();

	/**
	 * Obtem a chave/index de um elemento
	 *
	 * @param mixed $element
	 * @return scalar
	 */
	public function indexOf( $element );

	/**
	 * Obtem um elemento a partir da chave/index
	 *
	 * @param scalar $key
	 * @return mixed
	 */
	public function get( $key );

	/**
	 * Inverte a ordem dos elementos da cole��o
	 *
	 * @param boolean $preserveKey
	 */
	public function reverse( $preserveKey = true );

	/**
	 * Divide a cole��o em duas partes a partir de um criterio
	 *
	 * @param Closure $callback
	 * @return array
	 */
	public function partition(\Closure $callback );

	/**
	 * Converte a cole��o em um array
	 *
	 * @return array
	 */
	public function toArray();

	/**
	 * Importa um array para a cole��o
	 * 
	 * @param array $elements
	 */
	public function fromArray( array $elements );

}
?>