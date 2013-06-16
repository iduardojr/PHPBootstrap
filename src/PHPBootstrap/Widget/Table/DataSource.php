<?php
namespace PHPBootstrap\Widget\Table;

/**
 * Fonte de Dados
 */
interface DataSource {

	// Ordenaчѕes
	const Asc = 'asc';
	const Desc = 'desc';

	/**
	 * Obtem chave de identificaчуo
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
	 * Verifica e avanчa para o proximo rowset 
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
	 * Obtem total de registros
	 *
	 * @return integer
	 */
	public function getTotal();

}
?>