<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderiza titulo
 */
class RendererTitle extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'h1';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Title $ui, HtmlNode $node ) {
		if ( $ui->getPageHeader() ) {
			$node->addClass('page-header');
		}
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		
		if ( $ui->getAlign() ) {
			$node->addClass($ui->getAlign());
		}
		
		$node->appendNode($ui->getTitle());
		if ( $ui->getSubtext() ) {
			$node->appendNode('<small>' . $ui->getSubtext() . '</small>');
		}
	}
	
	/**
	 * 
	 * @see RendererWidget::createNode()
	 */
	protected function createNode(Title $ui) {
		return new HtmlNode('h' . $ui->getLevel());
	}


}
?>