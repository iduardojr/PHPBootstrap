<?php
namespace PHPBootstrap\Render\Html5\Form;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\TgFormReset;

/**
 * Renderizador de alternador que redefine formulario
 */
class RendererTgFormReset extends AbstractRendererTogglable {

	/**
	 * 
	 * @see RendererTgFormAbstract::_render()
	 */
	protected function _render( TgFormReset $ui, HtmlNode $node ) {
		parent::_render($ui, $node);
		$node->setAttribute('type', 'reset');
	}

}
?>