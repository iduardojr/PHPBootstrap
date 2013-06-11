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
	 * @return array
	 */
	public function fetch();
	
	/**
	 * Verifica e avan�a para o proximo rowset 
	 * 
	 * @return boolean
	 */
	public function next();

	/**
	 * Obtem o dado a partir de seu index
	 * 
	 * @param string $index
	 * @return string
	 */
	public function getData( $index );

	/**
	 * Obtem indice de ordena��o
	 *
	 * @return string
	 */
	public function getOrderKey();

	/**
	 * Obtem sequencia de ordena��o
	 *
	 * @return string
	 */
	public function getOrderBy();

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
	 * Obtem total de registros
	 *
	 * @return integer
	 */
	public function getTotal();

}
?>