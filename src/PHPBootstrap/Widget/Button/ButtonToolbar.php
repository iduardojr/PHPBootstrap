<?php
namespace PHPBootstrap\Widget\Button;

use PHPBootstrap\Common\ArrayCollection;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Barra de Botões
 */
class ButtonToolbar extends AbstractWidget implements Btn {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.button.toolbar';
	
	/**
	 * Grupo de Botoes
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
	 * Adiciona um grupo de botão
	 *
	 * @param ButtonGroup $item
	 * @return boolean
	 */
	public function addButtonGroup( ButtonGroup $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}
	
	/**
	 * Remove um grupo de botão
	 *
	 * @param ButtonGroup $item
	 * @return boolean
	 */
	public function removeButtonGroup( ButtonGroup $item ) {
		return $this->items->remove($item);
	}
	
	/**
	 * Obtem um iterador para os grupos de botao
	 *
	 * @return \Iterator
	 */
	public function getButtonGroups() {
		return $this->items->getElements();
	}

}
?>