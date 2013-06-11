<?php
namespace PHPBootstrap\Widget\Dropdown;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Toggle\Parameterizable;

/**
 * Alternador Dropdown
 */
class TgDropdown extends AbstractRender implements Pluggable, Parameterizable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.dropdown.toggle';
	
	/**
	 * Menu suspenso
	 *
	 * @var Dropdown
	 */
	protected $dropdown;

	/**
	 * Supenso para cima
	 *
	 * @var boolean
	 */
	protected $dropup;

	/**
	 * Seta
	 *
	 * @var boolean
	 */
	protected $caret;

	/**
	 * Construtor
	 *
	 * @param Dropdown $dropdown
	 * @param boolean $dropup
	 * @param boolean $caret
	 */
	public function __construct( Dropdown $dropdown, $dropup = false, $caret = true ) {
		$this->setDropdown($dropdown);
		$this->setDropup($dropup);
		$this->setCaret($caret);
	}

	/**
	 * Obtem direзгo para cima
	 *
	 * @return boolean
	 */
	public function getDropup() {
		return $this->dropup;
	}

	/**
	 * Atribui direзгo para cima
	 *
	 * @param boolean $dropup
	 */
	public function setDropup( $dropup ) {
		$this->dropup = ( bool ) $dropup;
	}

	/**
	 * Obtem menu suspenso
	 *
	 * @return Dropdown
	 */
	public function getDropdown() {
		return $this->dropdown;
	}

	/**
	 * Atribui menu suspenso
	 *
	 * @param Dropdown $dropdown
	 */
	public function setDropdown( Dropdown $dropdown ) {
		$this->dropdown = $dropdown;
	}

	/**
	 * Obtem caret
	 *
	 * @return boolean
	 */
	public function getCaret() {
		return $this->caret;
	}

	/**
	 * Atribui caret
	 *
	 * @param boolean $caret
	 */
	public function setCaret( $caret ) {
		$this->caret = ( bool ) $caret;
	}
	
	/**
	 *
	 * @see Parameterizable::setParameter()
	 */
	public function setParameter( $name, $value ) {
		foreach ( $this->dropdown->getItems() as $item ) {
			if ( $item instanceof DropdownLink && $item->getToggle() instanceof Parameterizable ) {
				$item->getToggle()->setParameter($name, $value);
			}
		}
	}

}
?>