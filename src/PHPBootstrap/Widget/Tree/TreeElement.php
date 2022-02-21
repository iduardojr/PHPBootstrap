<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Elemento de arvore
 */
abstract class TreeElement extends AbstractRender {
	
	/**
	 * Identificaчуo
	 *
	 * @var mixed
	 */
	protected $identify;
	
	/**
	 * Rotulo
	 *
	 * @var string|Widget
	 */
	protected $label;
	
	/**
	 * Botѕes
	 *
	 * @var ArrayCollection
	 */
	protected $buttons;
	
	/**
	 * Pai
	 *
	 * @var TreeComposite
	 */
	protected $parent;
	
	/**
	 * Construtor
	 *
	 * @param string $identify
	 * @param string|Widget $label
	 * @param Button|array $buttons
	 */
	public function __construct( $identify, $label, $buttons = null ) {
		$this->buttons = new ArrayCollection();
		$this->setIdentify($identify);
		$this->setLabel($label);
		if ( $buttons !== null ) {
			if ( !is_array($buttons) ) {
				$buttons = array($buttons);
			}
			foreach( $buttons as $button ) {
				$this->addButton($button);
			}
		}
	}
	
	/**
	 * Atribui uma identificaчуo
	 *
	 * @param string $identify
	 */
	public function setIdentify( $identify ) {
		$this->identify = $identify;
	}
	
	/**
	 *
	 * @see TreeElement::getIdentify()
	 */
	public function getIdentify() {
		return $this->identify;
	}
	
	/**
	 * Obtem o rotulo
	 *
	 * @return string|Widget
	 */
	public function getLabel() {
		return $this->label;
	}
	
	/**
	 * Atribui o rotulo
	 *
	 * @param string|Widget $label
	 */
	public function setLabel( $label ) {
		if ( ! ( is_scalar($label) || $label === null || $label instanceof Widget ) ) {
			throw new \InvalidArgumentException('label not is type string or instance of PHPBootstrap\Widget\Widget');
		}
		$this->label = $label;
	}
	
	/**
	 * Obtem pai
	 *
	 * @return TreeComposite
	 */
	public function getParent() {
		return $this->parent;
	}
	
	/**
	 * Atribui pai
	 *
	 * @param TreeComposite $parent
	 */
	public function setParent( TreeComposite $parent ) {
		$this->parent = $parent;
	}
	
	/**
	 * Adiciona um botуo
	 *
	 * @param Button $button
	 */
	public function addButton( Button $button ) {
		$this->buttons->append($button);
	}
	
	/**
	 * Remove um botуo
	 *
	 * @param Button $button
	 */
	public function removeButton( Button $button ) {
		$this->buttons->remove($button);
	}
	
	/**
	 * Obtem os botѕes
	 *
	 * @return ArrayIterator
	 */
	public function getButtons() {
		return $this->buttons->getElements();
	}
	
}
?>