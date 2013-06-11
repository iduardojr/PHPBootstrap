<?php
namespace PHPBootstrap\Render\Html5\Form;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\TgFormClear;

/**
 * Renderizador de alternador que limpar formulario
 */
class RendererTgFormClear extends AbstractRendererTogglable {

	/**
	 * 
	 * @see RendererTgFormAbstract::_render()
	 */
	protected function _render( TgFormClear $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('data-toggle', 'clear');
	}

}
?>