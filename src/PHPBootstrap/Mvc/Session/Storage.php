<?php
namespace PHPBootstrap\Mvc\Session;

/**
 * Interface para armazenamento dos dados da sessao
 */
interface Storage {

	/**
	 * Inicia a sess�o chamada por session_start
	 *
	 * @param string $path
	 * @param string $name
	 */
	public function open( $path, $name );

	/**
	 * Fecha a sess�o no final da pagina
	 */
	public function close();

	/**
	 * L� os dados da sess�o depois de session_start
	 * 
	 * @param string $identify
	 */
	public function read( $identify );

	/**
	 * Escreve os dados da sess�o 
	 *
	 * @param string $identify
	 * @param mixed $data
	 */
	public function write( $identify, $data );

	/**
	 * Destroi a sess�o
	 *
	 * @param string $identify
	 */
	public function destroy( $identify );

	/**
	 * Coletar lixo da sess�o em segundos
	 *
	 * @param int $maxlifetime
	 */
	public function gc( $maxlifetime );

}
?>