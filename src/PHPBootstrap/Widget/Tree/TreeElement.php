<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Render\Render;

/**
 * Elemento de arvore
 */
interface TreeElement extends Render {
	
	/**
	 * Obtem a identifica��o do elemento
	 * 
	 * @return string
	 */
	public function getIdentify();
	
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