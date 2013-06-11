<?php
namespace PHPBootstrap\Mvc\Auth\Adapter;

/**
 * Interface de um adaptador
 */
class Adapter {

	/**
	 * Busca os dados a partir da identidade
	 *
	 * @param string $identity
	 * @return boolean
	 */
	public function getByIdentity( $identity );

	/**
	 * Obtem a credencial
	 *
	 * @return string
	 */
	public function getCredential();

	/**
	 * Executa um algoritmo de segurança sobre a credencial
	 * 
	 * @param string $credential
	 * @return string
	 */
	public function algoSecure( $credential );

	/**
	 * Obtem os dados
	 * 
	 * @return mixed
	 */
	public function getData();

}
?>