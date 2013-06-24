<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\Enum;

/**
 * Arvore
 */
class Tree extends AbstractWidget implements TreeElement {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tree';
	
	const Filetree = 'filetree';
	
	/**
	 * Estilo
	 * 
	 * @var string
	 */
	protected $style;
	
	/**
	 * N�s
	 * 
	 * @var ArrayCollection
	 */
	protected $nodes;
	
	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param string $style
	 */
	public function __construct( $name, $style = null ) {
		$this->nodes = new ArrayCollection();
		$this->setName($name);
		$this->setStyle($style);
	}
	
	/**
	 * Obtem estilo
	 * 
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * Atribui estilo
	 * 
	 * @param string $style
	 */
	public function setStyle( $style ) {
		$this->style = $style;
	}

	/**
	 * Adiciona um n�
	 *
	 * @param TreeNode $node
	 * @throws \RuntimeException
	 */
	public function addNode( TreeNode $node ) {
		$this->nodes->append($node);
		$node->setParent($this);
	}
	
	/**
	 * Remove um n�
	 *
	 * @param TreeNode $node
	 */
	public function removeNode( TreeNode $node ) {
		$this->nodes->remove($node);
	}
	
	/**
	 * Obtem os n�s
	 *
	 * @return ArrayIterator
	 */
	public function getNodes() {
		return $this->nodes->getElements();
	}
	
}
?>