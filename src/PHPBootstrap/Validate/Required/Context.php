<?php
namespace PHPBootstrap\Validate\Required;

/**
 * Interface de um contexto
 */
interface Context {

	/**
	 * Obtem o valor do contexto
	 * 
	 * @return mixed
	 */
	public function getContextValue();
	
	/**
	 * Verifica se a dependência é atendida
	 * 
	 * @return boolean
	 */
	public function isDependency();

}
?>