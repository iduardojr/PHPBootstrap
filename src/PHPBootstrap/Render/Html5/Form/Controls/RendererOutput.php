<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\Output;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador de saida de dados
 */
class RendererOutput extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Output $ui, HtmlNode $node ) {
	    $node->addClass('output');
		if ( $ui->getSpan() ) {
			$node->addClass('span' . $ui->getSpan());
		}
		if ( $ui->getValue() ) {
			$node->appendNode($ui->getValue());
		}
	}
	
}
?>