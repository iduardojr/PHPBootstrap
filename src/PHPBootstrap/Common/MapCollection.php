<?php
namespace PHPBootstrap\Common;

/**
 * Interface de um mapa
 */
interface MapCollection extends Collection {

	/**
	 * Atribui um elemento na coleзгo a partir de uma chave/index
	 *
	 * @param scalar $key
	 * @param mixed $element
	 * @throws \InvalidArgumentException
	 */
	public function set( $key, $element );

	/**
	 * Verifica se uma chave existe na coleзгo
	 *
	 * @param scalar $key
	 */
	public function containsKey( $key );

	/**
	 * Remove um elemento da coleзгo a partir de uma chave/index
	 *
	 * @param scalar $key
	 * @return mixed
	 */
	public function removeKey( $key );

	/**
	 * Obtem as chaves da coleзгo
	 *
	 * @return \Iterator
	 */
	public function getKeys();

	/**
	 * Obtem os elementos da coleзгo
	 *
	 * @return \Iterator
	 */
	public function getElements();

	/**
	 * Obtem a chave/index do primeiro elemento
	 * 
	 * @return scalar
	 */
	public function getFirstKey();

	/**
	 * Obtem a chave/index do ultimo elemento
	 * 
	 * @return scalar
	 */
	public function getLastKey();

}
?>