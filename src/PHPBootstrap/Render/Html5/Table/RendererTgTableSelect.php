<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Table\TgTableSelect;

/**
 * Renderiza seleחדo dos items da tabela
 */
class RendererTgTableSelect extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgTableSelect $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'table-select');
		if ( $ui->getTogglable() ) {
			$node->setAttribute('data-select', $ui->getTogglable());
		}
		if ( $ui->getTarget() ) {
			$node->setAttribute('data-target', '#' . $ui->getTarget()->getName() );
		}
	}
}
?>