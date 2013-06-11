<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderiza icone
 */
class RendererIcon extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'i';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Icon $ui, HtmlNode $node ) {
		$node->addClass($ui->getIcon());
		
		if ( $ui->getWhite() ) {
			$node->addClass('icon-white');
		}
	}

}
?>