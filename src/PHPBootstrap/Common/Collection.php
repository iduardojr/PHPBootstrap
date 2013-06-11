<?php
namespace PHPBootstrap\Common;

/**
 * Interface de uma coleзгo
 */
interface Collection extends \IteratorAggregate, \Countable {

	/**
	 * Verifica se a coleзгo й vazia
	 *
	 * @return boolean
	 */
	public function isEmpty();

	/**
	 * Limpa a coleзгo
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
	 * Inverte a ordem dos elementos da coleзгo
	 *
	 * @param boolean $preserveKey
	 */
	public function reverse( $preserveKey = true );

	/**
	 * Divide a coleзгo em duas partes a partir de um criterio
	 *
	 * @param Closure $callback
	 * @return array
	 */
	public function partition(\Closure $callback );

	/**
	 * Converte a coleзгo em um array
	 *
	 * @return array
	 */
	public function toArray();

	/**
	 * Importa um array para a coleзгo
	 * 
	 * @param array $elements
	 */
	public function fromArray( array $elements );

}
?>