<?php
namespace PHPBootstrap\Widget\Button;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Form\Controls\Decorator\Embeddable;

/**
 * Grupo de botoes
 */
class ButtonGroup extends AbstractWidget implements Btn, Embeddable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.button.group';

	/**
	 * Layout vertical
	 *
	 * @var boolean
	 */
	protected $vertical;
	
	/**
	 * Botoes
	 * 
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 *
	 * @param Button $btn
	 * @param ...
	 * @throws \InvalidArgumentException
	 */
	public function __construct( Button $btn = null ) {
		$this->items = new ArrayCollection();
		$buttons = func_get_args();
		foreach ( $buttons as $i => $btn ) {
			if ( ! $btn instanceof Button ) {
				throw new \InvalidArgumentException('argument[' . $i . '] not instance of PHPBootstrap\Widget\Button\Button');
			}
			$this->addButton($btn);
		}
	}

	/**
	 * Obtem layout vertical do grupo
	 *
	 * @return boolean
	 */
	public function getVertical() {
		return $this->vertical;
	}

	/**
	 * Atribui layout vertical do grupo
	 *
	 * @param boolean $vertical
	 */
	public function setVertical( $vertical ) {
		$this->vertical = ( bool ) $vertical;
	}
	
	/**
	 * Adiciona um botão
	 *
	 * @param Button $item
	 * @return boolean
	 */
	public function addButton( Button $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}
	
	/**
	 * Remove um botão
	 *
	 * @param Button $item
	 * @return boolean
	 */
	public function removeButton( Button $item ) {
		return $this->items->remove($item);
	}
	
	/**
	 * Obtem um iterador para os botoes
	 *
	 * @return \Iterator
	 */
	public function getButtons() {
		return $this->items->getElements();
	}

}
?>