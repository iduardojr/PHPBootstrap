<?php
namespace PHPBootstrap\Mvc\Auth\Adapter;

/**
 * Interface de um adaptador
 */
abstract class Adapter {

	/**
	 * Busca os dados a partir da identidade
	 *
	 * @param string $identity
	 * @return boolean
	 */
	public abstract function getByIdentity( $identity );


	/**
	 * Obtem a credencial
	 *
	 * @return string
	 */
	public abstract function getCredential();

	/**
	 * Executa um algoritmo de seguran�a sobre a credencial
	 * 
	 * @param string $credential
	 * @return string
	 */
	public abstract function algoSecure( $credential );

	/**
	 * Obtem os dados
	 * 
	 * @return mixed
	 */
	public abstract function getData();

}
?>