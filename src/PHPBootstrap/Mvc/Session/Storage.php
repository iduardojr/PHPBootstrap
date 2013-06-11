<?php
namespace PHPBootstrap\Mvc\Session;

/**
 * Interface para armazenamento dos dados da sessao
 */
interface Storage {

	/**
	 * Inicia a sessão chamada por session_start
	 *
	 * @param string $path
	 * @param string $name
	 */
	public function open( $path, $name );

	/**
	 * Fecha a sessão no final da pagina
	 */
	public function close();

	/**
	 * Lê os dados da sessão depois de session_start
	 * 
	 * @param string $identify
	 */
	public function read( $identify );

	/**
	 * Escreve os dados da sessão 
	 *
	 * @param string $identify
	 * @param mixed $data
	 */
	public function write( $identify, $data );

	/**
	 * Destroi a sessão
	 *
	 * @param string $identify
	 */
	public function destroy( $identify );

	/**
	 * Coletar lixo da sessão em segundos
	 *
	 * @param int $maxlifetime
	 */
	public function gc( $maxlifetime );

}
?>