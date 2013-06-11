<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Implementaчуo abstrata de elemento de navegaчуo
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