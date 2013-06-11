<?php
namespace PHPBootstrap\Widget\Accordion;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Collapse\TgCollapse;
use PHPBootstrap\Widget\Collapse\Containable;
use PHPBootstrap\Common\ArrayCollection;

/**
 * Acordeão
 */
class Accordion extends AbstractWidget implements Containable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.accordion';

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->setName($name);
		$this->items = new ArrayCollection();
	}

	/**
	 * Adiciona um item accordion
	 * 
	 * @param AccordionItem $item
	 * @return boolean
	 */
	public function addItem( AccordionItem $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$item->setToggle(new TgCollapse($item, $this));
		$this->items->append($item);
		return true;
	}

	/**
	 * Remove um item no accordion
	 * 
	 * @param AccordionItem $item
	 * @return boolean
	 */
	public function removeItem( AccordionItem $item ) {
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