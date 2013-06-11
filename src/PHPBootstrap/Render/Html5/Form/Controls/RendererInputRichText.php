<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\RichText;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de editor de texto
 */
class RendererInputRichText extends RendererInputTextArea {

	/**
	 * Tipo de controle
	 *
	 * @var string
	 */
	const CONTROL = 'RichText';

	/**
	 *
	 * @see RendererInputTextArea::_render()
	 */
	protected function _render( RichText $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('data-richtext-type', $ui->getType());
	}

}
?>