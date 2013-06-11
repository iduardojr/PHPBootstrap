<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Render\Render;

/**
 * Interface de um componente de navegaчуo
 */
interface Element extends Render {

	/**
	 * Atribui widget de navegaчуo pai
	 *
	 * @param Nav $parent
	 */
	public function setNavParent( Navegable $parent = null );
	
	/**
	 * Obtem widget de navegaчуo pai
	 *
	 * @return Nav
	*/
	public function getNavParent();
	
}
?>