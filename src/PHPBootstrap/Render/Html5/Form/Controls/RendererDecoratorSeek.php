<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Form\Controls\Decorator\Seek;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador de alternador de busca
 */
class RendererDecoratorSeek extends RendererDependsResponse {

	/**
	 *
	 * @see RendererToggle::_render()
	 */
	protected function _render( Seek $ui, HtmlNode $node ) {
		$node->setAttribute('data-provide', 'seek');
		$node->setAttribute('data-remote', $ui->getAction()->toURI());
	}

}
?>