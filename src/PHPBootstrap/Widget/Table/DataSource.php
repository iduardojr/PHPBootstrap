<?php
namespace PHPBootstrap\Widget\Table;

/**
 * Fonte de Dados
 */
interface DataSource {
	
	// Ordena��es
	const Asc = 'asc';
	const Desc = 'desc';

	/**
	 * Obtem chave de identifica��o
	 *
	 * @return string
	 */
	public function getIdentify();

	/**
	 * Obtem o rowset
	 *
	 * @return mixed
	 */
	public function fetch();

	/**
	 * Verifica e avan�a para o proximo rowset 
	 * 
	 * @return boolean
	 */
	public function next();

	/**
	 * Obtem o campo a ser ordenado
	 *
	 * @return string
	 */
	public function getSort();

	/**
	 * Obtem ordem
	 *
	 * @return string
	 */
	public function getOrder();

	/**
	 * Obtem quantidade de registros a retornar
	 *
	 * @return integer
	 */
	public function getLimit();

	/**
	 * Obtem o indice do primeiro registro
	 *
	 * @return integer
	 */
	public function getOffset();

	/**
	 * Obtem o total de registros
	 *
	 * @return integer
	 */
	public function getTotal();
	
	/**
	 * Restabelece o conjunto de dados
	 */
	public function reset();
	
	/**
	 * Obtem o valor da linha corrente
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function __get( $name );
}
?>