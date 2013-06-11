<?php
namespace PHPBootstrap\Mvc\Auth\Storage;

/**
 * Interface de armazenamento
 */
interface Storage {
	
	/**
	 * Obtem o conteudo armazenado
	 * 
	 * @return mixed
	 */
	public function read();
	
	/**
	 * Grava o conteudo
	 *
	 * @param mixed $data
 	 */
	public function write($data);
	
	/**
	 * Limpa o conteudo armazenado
	 *
	 * @return void
	*/
	public function clear();
}
?>