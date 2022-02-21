<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Render\Render;
use PHPBootstrap\Widget\Renderable;

interface TreeComposite extends Render, Renderable {
	
	/**
	 * Obtem a identificaзгo do elemento
	 *
	 * @return string
	 */
	public function getIdentify();
	
	/**
	 * Adiciona um nу
	 *
	 * @param TreeElement $node
	 */
	public function addNode( TreeElement $node );
	
	/**
	 * Remove um nу
	 *
	 * @param TreeElement $node
	*/
	public function removeNode( TreeElement $node );
	
	/**
	 * Obtem os nуs
	 *
	 * @return ArrayIterator
	*/
	public function getNodes();
	
	/**
	 * Obtem a aзгo para abrir o nу
	 *
	 * @return Action
	*/
	public function getCollapsable();
}
?>