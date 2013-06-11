<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Render\Render;

/**
 * Interface de um componente de navega��o
 */
interface Element extends Render {

	/**
	 * Atribui widget de navega��o pai
	 *
	 * @param Nav $parent
	 */
	public function setNavParent( Navegable $parent = null );
	
	/**
	 * Obtem widget de navega��o pai
	 *
	 * @return Nav
	*/
	public function getNavParent();
	
}
?>