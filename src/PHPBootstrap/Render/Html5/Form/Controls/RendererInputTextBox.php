<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\TextBox;

/**
 * Renderizador de entrada de campo
 */
class RendererInputTextBox extends AbstractRendererInputTextBox {

	/**
	 * Nome do controle
	 *
	 * @var string
	 */
	const CONTROL = 'TextBox';
	
	/**
	 * Tipo do input
	 *
	 * @var string
	 */
	const INPUT_TYPE = 'text';

	/**
	 *
	 * @see AbstractRendererInputTextBox::_render()
	 */
	protected function _render( TextBox $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		if ( $ui->getMask() ) {
			$this->toRender($ui->getMask(), new Context($node));
		}
		if ( $ui->getSuggestion() ) {
			$this->toRender($ui->getSuggestion(), new Context($node));
		}
	}

}
?>