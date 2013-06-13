<?php
namespace PHPBootstrap\Validate;

/**
 * Interface de valida��o
 */
interface Validate {
	
	/**
	 * Obtem a identifica��o da valida��o
	 *
	 * @return string
	 */
	public function getIdentify();
	
	/**
	 * Obtem o contexto
	 *
	 * @return mixed
	 */
	public function getContext();

	/**
	 * Obtem a mensagem
	 * 
	 * @return string
	 */
	public function getMessage();

	/**
	 * Atribui a mensagem
	 * 
	 * @param string $message
	 */
	public function setMessage( $message );

	/**
	 * Afirma se � um valor valido
	 * 
	 * @param mixed $value
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	public function assert( $value );
	
	/**
	 * Valida um valor
	 *
	 * @param mixed $value
	 * @return boolean
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	public function valid( $value );
	
}
?>