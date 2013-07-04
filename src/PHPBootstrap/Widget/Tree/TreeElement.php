<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Render\Render;

/**
 * Elemento de arvore
 */
interface TreeElement extends Render {
	
	/**
	 * Adiciona um nó
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function addNode( TreeNode $node );
	
	/**
	 * Remove um nó
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function removeNode( TreeNode $node );
	
	/**
	 * Obtem os nós
	 *
	 * @return ArrayIterator
	 */
	public function getNodes();
	
}
?>