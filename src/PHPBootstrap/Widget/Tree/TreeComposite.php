<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Render\Render;
use PHPBootstrap\Widget\Renderable;

interface TreeComposite extends Render, Renderable {
	
	/**
	 * Obtem a identifica��o do elemento
	 *
	 * @return string
	 */
	public function getIdentify();
	
	/**
	 * Adiciona um n�
	 *
	 * @param TreeElement $node
	 */
	public function addNode( TreeElement $node );
	
	/**
	 * Remove um n�
	 *
	 * @param TreeElement $node
	*/
	public function removeNode( TreeElement $node );
	
	/**
	 * Obtem os n�s
	 *
	 * @return ArrayIterator
	*/
	public function getNodes();
	
	/**
	 * Obtem a a��o para abrir o n�
	 *
	 * @return Action
	*/
	public function getCollapsable();
}
?>