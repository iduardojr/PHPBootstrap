<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Render\RenderKit;

/**
 * Nó
 */
class TreeNode extends TreeElement implements TreeComposite {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tree.node';
	
	/**
	 * Numero de nós
	 *
	 * @var integer
	 */
	protected $numberNodes;
	
	/**
	 * Nós
	 *
	 * @var ArrayCollection
	 */
	protected $nodes;
	
	/**
	 * Aberto
	 *
	 * @var boolean
	 */
	protected $opened;
	
	/**
	 * Construtor
	 *
	 * @param string $identify
	 * @param string|Widget $label
	 * @param Button|array $buttons
	 * @param integer $numberNodes
	 */
	public function __construct( $identify, $label, $buttons = null, $numberNodes = 0 ) {
		$this->nodes = new ArrayCollection();
		parent::__construct($identify, $label, $buttons);
		$this->setNumberNodes($numberNodes);
	}
	
	/**
	 * 
	 * @see TreeComposite::addNode()
	 */
	public function addNode( TreeElement $node ) {
		$node->setParent($this);
		$this->nodes->append($node);
	}
	
	/**
	 * 
	 * @see TreeComposite::removeNode()
	 */
	public function removeNode( TreeElement $node ) {
		$this->nodes->remove($node);
	}
	
	/**
	 * Obtem os nós
	 *
	 * @return ArrayIterator
	 */
	public function getNodes() {
		return $this->nodes->getElements();
	}
	
	/**
	 * Atribui o numero de nós
	 *
	 * @param integer $numberNodes
	 */
	public function setNumberNodes( $numberNodes ) {
		$this->numberNodes = ( int ) $numberNodes;
	}
	
	/**
	 * Obtem o numero de nós
	 *
	 * @return integer
	 */
	public function getNumberNodes() {
		return $this->nodes->isEmpty() ? $this->numberNodes : $this->nodes->count();
	}
	
	/**
	 * Obtem aberto
	 *
	 * @return boolean
	 */
	public function getOpened() {
		return $this->opened;
	}
	
	/**
	 * Atribui aberto
	 *
	 * @param boolean $opened
	 */
	public function setOpened( $opened ) {
		$this->opened = ( bool ) $opened;
		if ( $this->parent instanceof TreeNode && $this->opened ) {
			$this->parent->setOpened(true);
		}
	}
	
	/**
	 * 
	 * @see TreeComposite::getCollapsable()
	 */
	public function getCollapsable() {
		if ( $this->parent ) {
			return $this->parent->getCollapsable();
		}
		return null;
	}
	
	/**
	 *
	 * @see Renderable::render()
	 */
	public function render() {
		RenderKit::getInstance()->render($this);
	}
}
?>