<?php
namespace PHPBootstrap\Validate;

/**
 * Interface de um elemento validavel
 */
interface Validatable {
	
	/**
	 * Valida um valor
	 * 
	 * @param mixed $value
	 * @return boolean
	 */
	public function valid( $value );
	
	/**
	 * Obtem as messagens de erro
	 * 
	 * @return array
	 */
	public function getMessages();
	
	/**
	 * Obtem as validações
	 * 
	 * @return array 
	 */
	public function getValidate();
}
?>