<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Widget;

/**
 * Nу
 */
class TreeNode extends AbstractRender implements TreeElement {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tree.node';
	
	/**
	 * Valor
	 * 
	 * @var mixed
	 */
	protected $value;
	
	/**
	 * Rotulo
	 * 
	 * @var string|Widget
	 */
	protected $label;
	
	/**
	 * Botхes
	 * 
	 * @var ArrayCollection
	 */
	protected $buttons;
	
	/**
	 * Nуs
	 *
	 * @var ArrayCollection
	 */
	protected $nodes;
	
	/**
	 * Pai
	 *
	 * @var TreeNode
	 */
	protected $parent;
	
	/**
	 * Folha
	 * 
	 * @var boolean
	 */
	protected $leaf;
	
	/**
	 * Aberto
	 *
	 * @var boolean
	 */
	protected $opened;
	
	/**
	 * Identificaзгo
	 * 
	 * @var mixed
	 */
	protected $identify;
	
	/**
	 * Construtor
	 *
	 * @param string $identify
	 * @param string|Widget $label
	 * @param mixed $value
	 * @param Button|array $buttons
	 * @param boolean|null $leaf
	 */
	public function __construct( $identify, $label, $value = null, $buttons = null, $leaf = null) {
		$this->nodes = new ArrayCollection();
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
		$this->setLeaf($leaf);
		$this->setValue($value);
	}
	
	/**
	 * Atribui uma identificaзгo
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
	 * Obtem o valor 
	 * 
	 * @return scalar|array
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Atribui o valor
	 * 
	 * @param scalar|array $value
	 */
	public function setValue( $value ) {
		if ( ! ( $value === null || is_scalar($value) || is_array($value) ) ) {
			throw new \InvalidArgumentException('value not is scalar or array');
		}
		$this->value = $value;
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
	 * @return TreeElement
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Atribui pai
	 * 
	 * @param TreeElement $parent
	 */
	public function setParent( TreeElement $parent ) {
		$this->parent = $parent;
	}
	
	/**
	 * Adiciona um botгo
	 *
	 * @param Button $button
	 */
	public function addButton( Button $button ) {
		$this->buttons->append($button);
	}
	
	/**
	 * Remove um botгo
     *
	 * @param Button $button
	 */
	public function removeButton( Button $button ) {
		$this->buttons->remove($button);
	}

	/**
	 * Obtem os botхes
	 * 
	 * @return ArrayIterator
	 */
	public function getButtons() {
		return $this->buttons->getElements();
	}
	
	/**
	 * Adiciona um nу
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function addNode( TreeNode $node ) {
		if ( $this->leaf === true ) {
			throw new \BadMethodCallException('unssuported method. Node is leaf');
		}
		$node->setParent($this);
		$this->nodes->append($node);
	}
	
	/**
	 * Remove um nу
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function removeNode( TreeNode $node ) {
		if ( $this->leaf === true ) {
			throw new \BadMethodCallException('unssuported method. Node is leaf');
		}
		$this->nodes->remove($node);
	}
	
	/**
	 * Obtem os nуs
	 *
	 * @return ArrayIterator
	 */
	public function getNodes() {
		return $this->nodes->getElements();
	}
	
	/**
	 * Verifica se й nу folha
	 *
	 * @return boolean
	 */
	public function isLeaf() {
		return ! ( $this->nodes->count() > 0 || $this->leaf === false ) ;
	}
	
	/**
	 * Obtem aberto
	 *
	 * @return boolean
	 */
	public function getOpened() {
		return $this->opened || $this->nodes->count() == 0;
	}
	
	/**
	 * Atribui aberto
	 *
	 * @param boolean $opened
	 */
	public function setOpened( $opened ) {
		$this->opened = (bool) $opened;
		if ( $this->parent instanceof TreeNode && $this->opened ) {
			$this->parent->setOpened(true);
		}
	}
	
	/**
	 * Obtem se й um nу folha
	 * 
	 * @return boolean|null
	 */
	public function getLeaf() {
		return $this->leaf;
	}

	/**
	 * Atribui um nу folha ou nгo
	 * 
	 * @param boolean|null $leaf
	 */
	public function setLeaf( $leaf ) {
		if ( $leaf !== null) {
			$leaf = (bool) $leaf;
		}
		if ( $leaf === true ) {
			$this->nodes->clear();
		}
		$this->leaf = $leaf;
	}
	
}
?>