<?php
namespace PHPBootstrap\Widget\Dropdown;

use PHPBootstrap\Render\Render;

/**
 * Elemento dropdown
 */
interface DropdownElement extends Render {

	/**
	 * Atribui pai
	 * 
	 * @param Dropdown $parent
	 */
	public function setParent( Dropdown $parent = null );

	/**
	 * Obtem pai
	 *
	 * @return Dropdown
	 */
	public function getParent();

}
?>