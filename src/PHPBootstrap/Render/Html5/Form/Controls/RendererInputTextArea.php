<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\TextArea;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de area de texto
 */
class RendererInputTextArea extends AbstractRendererInputBox {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'textarea';

	/**
	 * Tipo de controle
	 *
	 * @var string
	 */
	const CONTROL = 'TextArea';

	/**
	 *
	 * @see AbstractRendererInputBox::renderValue()
	 */
	protected function renderValue( TextArea $ui, HtmlNode $node ) {
		$node->appendNode(( string ) $ui->getText());
	}

	/**
	 *
	 * @see AbstractRendererInputBox::renderSize()
	 */
	protected function renderSize( TextArea $ui, HtmlNode $node ) {
		if ( $ui->getRows() ) {
			$node->setAttribute('rows', $ui->getRows());
		}
		parent::renderSize($ui, $node);
	}

}
?>