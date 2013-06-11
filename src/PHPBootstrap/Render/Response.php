<?php
namespace PHPBootstrap\Render;

/**
 * Resposta da renderizaчуo
 */
interface Response {
	
	/**
	 *  Descarrega o objeto resposta
	 */
	public function flush();
}
?>