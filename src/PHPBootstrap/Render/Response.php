<?php
namespace PHPBootstrap\Render;

/**
 * Resposta da renderiza��o
 */
interface Response {
	
	/**
	 *  Descarrega o objeto resposta
	 */
	public function flush();
}
?>