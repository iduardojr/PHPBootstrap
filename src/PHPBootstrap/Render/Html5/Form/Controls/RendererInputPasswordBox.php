<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\PasswordBox;

/**
 * Renderizador de password
 */
class RendererInputPasswordBox extends AbstractRendererInputTextBox {

	/**
	 * Nome do controle
	 *
	 * @var string
	 */
	const CONTROL = 'PasswordBox';

	/**
	 * Tipo do input
	 *
	 * @var string
	 */
	const INPUT_TYPE = 'password';

	/**
	 *
	 * @see AbstractRendererInputBox::renderValue()
	 */
	protected function renderValue( PasswordBox $ui, HtmlNode $node ) {
		
	}

}
?>