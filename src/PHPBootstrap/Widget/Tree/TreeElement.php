<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Render\Render;

/**
 * Elemento de arvore
 */
interface TreeElement extends Render {
	
	/**
	 * Adiciona um n�
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function addNode( TreeNode $node );
	
	/**
	 * Remove um n�
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function removeNode( TreeNode $node );
	
	/**
	 * Obtem os n�s
	 *
	 * @return ArrayIterator
	 */
	public function getNodes();
	
}
?>