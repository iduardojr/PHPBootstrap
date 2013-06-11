<?php
namespace PHPBootstrap\Widget\Dropdown;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Divisor do dropdown
 */
class DropdownDivider extends AbstractRender implements DropdownElement {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.dropdown.divider';

	/**
	 * Pai
	 *
	 * @var Dropdown
	 */
	protected $parent;

	/**
	 * Construtor
	 */
	public function __construct() {
	}

	/**
	 *
	 * @see DropdownElement::getParent()
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 *
	 * @see DropdownElement::setParent()
	 */
	public function setParent( Dropdown $parent = null ) {
		$this->parent = $parent;
	}

}
?>