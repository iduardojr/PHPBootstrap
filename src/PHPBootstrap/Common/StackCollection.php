<?php
namespace PHPBootstrap\Common;

/**
 * Interface de uma pilha
 */
interface StackCollection extends Collection {

	/**
	 * Adiciona um elemento no fim da cole��o
	 *
	 * @param mixed $element
	 * @throws \InvalidArgumentException
	 */
	public function append( $element );

	/**
	 * Adiciona um elemento no inicio da cole��o
	 *
	 * @param mixed $element
	 * @throws \InvalidArgumentException
	 */
	public function prepend( $element );

	/**
	 * Substitui um elemento por outro na cole��o
	 *
	 * @param mixed $elementOld
	 * @param mixed $elementNew
	 * @throws \InvalidArgumentException
	 */
	public function replace( $elementOld, $elementNew );

	/**
	 * Insere um elemento e chave/index na cole��o depois de uma chave/index
	 *
	 * @param scalar $keySearch
	 * @param mixed $element
	 * @param scalar $key
	 * @throws \InvalidArgumentException
	 */
	public function after( $keySearch, $element, $key = null );

	/**
	 * Insere um elemento e chave/index na cole��o antes de uma chave/index
	 *
	 * @param scalar $keySearch
	 * @param mixed $element
	 * @param scalar $key
	 * @throws \InvalidArgumentException
	 */
	public function before( $keySearch, $element, $key = null );

	/**
	 * Retira um elemento do fim da cole��o
	 *
	 * @return mixed
	 */
	public function pop();

	/**
	 * Retira um elemento do inicio da cole��o
	 *
	 * @return mixed
	 */
	public function shift();

	/**
	 * Redefine a chaves/index da cole��o
	 */
	public function resetKeys();

}
?>