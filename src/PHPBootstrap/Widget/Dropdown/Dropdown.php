<?php
namespace PHPBootstrap\Widget\Dropdown;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Lista Suspensa
 */
class Dropdown extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.dropdown';

	// Alinhamentos
	const Left = 'pull-left';
	const Right = 'pull-right';

	/**
	 * Alinhamento
	 *
	 * @var string
	 */
	protected $align;

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->items = new ArrayCollection();
	}

	/**
	 * Obtem alinhamento
	 *
	 * @return string
	 */
	public function getAlign() {
		return $this->align;
	}

	/**
	 * Atribui um alinhamento:
	 * - Dropdown.Left
	 * - Dropdown.Right
	 * 
	 * @param string $align
	 * @throws \UnexpectedValueException
	 */
	public function setAlign( $align ) {
		$this->align = Enum::ensure($align, $this, null);
	}
	
	/**
	 * Adiciona um item
	 *
	 * @param DropdownElement $item
	 */
	public function addItem( DropdownElement $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}
	
	/**
	 * Remove um item
	 *
	 * @param DropdownElement $item
	 */
	public function removeItem( DropdownElement $item ) {
		return $this->items->remove($item);
	}
	
	/**
	 * Obtem um iterador para os items
	 *
	 * @return \Iterator
	 */
	public function getItems() {
		return $this->items->getElements();
	}

}
?>