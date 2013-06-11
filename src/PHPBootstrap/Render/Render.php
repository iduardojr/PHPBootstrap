<?php
namespace PHPBootstrap\Render;

/**
 * Interface de objeto renderizavel
 */
interface Render {
	
	/**
	 * Obtem o tipo do renderizador
	 *
	 * @return string
	 */
	public function getRendererType();
	
}
?>