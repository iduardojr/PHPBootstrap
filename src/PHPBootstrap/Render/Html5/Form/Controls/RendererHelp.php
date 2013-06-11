<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\Help;

/**
 * Renderizador de Ajuda
 */
class RendererHelp extends RendererWidget {

	const TAGNODE = 'span';
	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Help $ui, HtmlNode $node ) {
		$node->addClass('help-' . ( $ui->getInline() ? 'inline' : 'block' ));
		$node->appendNode($ui->getText());
	}

}
?>