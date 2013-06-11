<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Misc\Badge;

/**
 * Renderizador de emblema
 */
class RendererBadge extends RendererWidget {
	
	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'span';

	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Badge $ui, HtmlNode $node ) {
		$node->addClass('badge');
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		$node->appendNode($ui->getText());
	}

}
?>