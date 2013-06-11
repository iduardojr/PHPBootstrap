<?php
namespace PHPBootstrap\Common;

/**
 * Interface de uma lista
 */
interface ListCollection extends Collection {

	/**
	 * Adiciona um elemento na lista
	 *
	 * @param mixed $element
	 * @throws \InvalidArgumentException
	 */
	public function add( $element );

	/**
	 * Verifica se um elemento existe na coleзгo
	 *
	 * @param mixed $element
	 * @throws \InvalidArgumentException
	 */
	public function contains( $element );

	/**
	 * Remove um elemento da coleзгo
	 *
	 * @param mixed $element
	 * @throws \InvalidArgumentException
	 */
	public function remove( $element );

	/**
	 * Obtem o primeiro elemento
	 * 
	 * @return mixed
	 */
	public function getFirst();

	/**
	 * Obtem o ultimo elemento
	 * 
	 * @return mixed
	 */
	public function getLast();

}
?>