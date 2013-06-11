<?php
namespace PHPBootstrap\Widget\Dropdown;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Cabeçalho do dropdown
 */
class DropdownHeader extends AbstractRender implements DropdownElement {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.dropdown.header';
	
	/**
	 * Pai
	 *
	 * @var Dropdown
	 */
	protected $parent;
	
	/**
	 * Texto
	 *
	 * @var string
	 */
	protected $text;
	
	/**
	 * Construtor
	 * 
	 * @param string $text
	 */
	public function __construct( $text ) {
		$this->setText($text);
	}

	/**
	 * Obtem Texto
	 * 
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Atribui texto
	 * 
	 * @param string $text
	 */
	public function setText( $text ) {
		$this->text = $text;
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