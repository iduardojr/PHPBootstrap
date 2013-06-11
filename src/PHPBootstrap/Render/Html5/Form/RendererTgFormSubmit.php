<?php
namespace PHPBootstrap\Render\Html5\Form;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\TgFormSubmit;

/**
 * Renderizador de alternador que envia formulario
 */
class RendererTgFormSubmit extends AbstractRendererTogglable {

	/**
	 * 
	 * @see RendererTgFormAbstract::_render()
	 */
	protected function _render( TgFormSubmit $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('type', 'submit');
		$node->setAttribute('formaction', $ui->getAction()->toURI());
		if ( ! $ui->getValidate() ) {
			$node->setAttribute('formnovalidate', 'formnovalidate');
		}
		
	}

}
?>