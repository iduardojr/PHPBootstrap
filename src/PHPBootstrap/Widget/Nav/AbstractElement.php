<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Implementação abstrata de elemento de navegação
 */
abstract class AbstractElement extends AbstractRender implements Element {

	/**
	 * Pai
	 * 
	 * @var Navegable
	 */
	protected $parent;

	/**
	 *
	 * @see Element::setParent()
	 */
	public function setNavParent( Navegable $parent = null ) {
		$this->parent = $parent;
	}

	/**
	 *
	 * @see Element::getParent()
	 */
	public function getNavParent() {
		return $this->parent;
	}
	
}
?>