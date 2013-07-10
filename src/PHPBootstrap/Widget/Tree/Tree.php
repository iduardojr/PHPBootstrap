<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\ArrayIterator;

/**
 * Arvore
 */
class Tree extends AbstractWidget implements TreeElement {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tree';
	
	// Estilo
	const Filetree = 'filetree';
	
	/**
	 * Estilo
	 * 
	 * @var string
	 */
	protected $style;
	
	/**
	 * Nós
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
	 * @see TreeElement::getIdentify()
	 */
	public function getIdentify() {
		return $this->getName();
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
	 * Adiciona um nó
	 *
	 * @param TreeNode $node
	 * @throws \RuntimeException
	 */
	public function addNode( TreeNode $node ) {
		$this->nodes->append($node);
		$node->setParent($this);
	}
	
	/**
	 * Remove um nó
	 *
	 * @param TreeNode $node
	 */
	public function removeNode( TreeNode $node ) {
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
	 * Obtem um nó a partir do valor
	 *
	 * @param mixed $value
	 */
	public function getNode( $value ) {
		foreach ( $this->getNodes() as $node ) {
			$find = $this->findNode($node, $value);
			if ( $find ) {
				return $find;
			}
		} 
		return null;
	}
	
	/**
	 * Busca um nó
	 *
	 * @param TreeNode $node
	 * @param mixed $value
	 * @return TreeNode
	 */
	private function findNode( TreeNode $node, $value ){
		if ( $node->getValue() === $value ) {
			return $node;
		}
		foreach( $node->getNodes() as $node ) {
			$find = $this->findNode($node, $value);
			if ( $find ) {
				return $find;
			}
		}
		return null;
	}
}
?>