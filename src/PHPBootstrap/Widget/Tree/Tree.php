<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Widget\Action\Action;

/**
 * Arvore
 */
class Tree extends AbstractWidget implements TreeComposite {
	
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
	 * Nуs
	 * 
	 * @var ArrayCollection
	 */
	protected $nodes;
	
	/**
	 * Aзгo 
	 * 
	 * @var Action
	 */
	protected $collapsable;
	
	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Action $collapsable
	 * @param string $style
	 */
	public function __construct( $name, Action $collapsable = null, $style = null ) {
		$this->nodes = new ArrayCollection();
		$this->setName($name);
		$this->setCollapsable($collapsable);
		$this->setStyle($style);
	}
	
	/**
	 * 
	 * @see TreeComposite::getIdentify()
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
	 * Atribui a aзгo de abrir o nу
	 *
	 * @param Action $collapsable
	 */
	public function setCollapsable( Action $collapsable = null ) {
		$this->collapsable = $collapsable;
	}
	
	/**
	 *
	 * @see TreeComposite::getCollapsable()
	 */
	public function getCollapsable() {
		return $this->collapsable;
	}

	/**
	 * Adiciona um nу
	 *
	 * @param TreeElement $node
	 */
	public function addNode( TreeElement $node ) {
		$node->setParent($this);
		$this->nodes->append($node);
	}
	
	/**
	 * Remove um nу
	 *
	 * @param TreeElement $node
	 */
	public function removeNode( TreeElement $node ) {
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
	 * Obtem um nу a partir da identificaзгo
	 *
	 * @param mixed $identify
	 * @return TreeElement
	 */
	public function getNode( $identify ) {
		foreach ( $this->getNodes() as $node ) {
			$find = $this->findNode($node, $identify);
			if ( $find ) {
				return $find;
			}
		} 
		return null;
	}
	
	/**
	 * Busca um nу
	 *
	 * @param TreeElement $node
	 * @param mixed $identify
	 * @return TreeElement
	 */
	private function findNode( TreeElement $node, $identify ){
		if ( $node->getIdentify() === $identify ) {
			return $node;
		}
		foreach( $node->getNodes() as $node ) {
			$find = $this->findNode($node, $identify);
			if ( $find ) {
				return $find;
			}
		}
		return null;
	}

}
?>