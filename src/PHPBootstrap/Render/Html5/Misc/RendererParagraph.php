<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Widget\Misc\Paragraph;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderiza um paragrafo
 */
class RendererParagraph extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'p';

	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Paragraph $ui, HtmlNode $node ) {
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		
		if ( $ui->getAlign() ) {
			$node->addClass($ui->getAlign());
		}
		
		$node->appendNode($ui->getText());
	}

}
?>