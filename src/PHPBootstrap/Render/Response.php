<?php
namespace PHPBootstrap\Render;

/**
 * Resposta da renderização
 */
interface Response {
	
	/**
	 *  Descarrega o objeto resposta
	 */
	public function flush();
}
?>