<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgSeek;

/**
 * Renderizador de alternador de busca
 */
class RendererDecoratorTgSeek extends AbstractRendererDecoratorSearchable {

	/**
	 *
	 * @see RendererToggle::_render()
	 */
	protected function _render( TgSeek $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'seek');
		parent::_render($ui, $node);
	}

}
?>