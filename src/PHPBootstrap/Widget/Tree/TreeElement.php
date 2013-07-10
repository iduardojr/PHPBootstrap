<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Render\Render;

/**
 * Elemento de arvore
 */
interface TreeElement extends Render {
	
	/**
	 * Obtem a identificaзгo do elemento
	 * 
	 * @return string
	 */
	public function getIdentify();
	
	/**
	 * Adiciona um nу
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function addNode( TreeNode $node );
	
	/**
	 * Remove um nу
	 *
	 * @param TreeNode $node
	 * @throws \BadMethodCallException
	 */
	public function removeNode( TreeNode $node );
	
	/**
	 * Obtem os nуs
	 *
	 * @return ArrayIterator
	 */
	public function getNodes();
	
}
?>