<?php
namespace PHPBootstrap\Render\Html5\Form;

use PHPBootstrap\Widget\Form\Togglable;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Renderizador abstrato de form
 */
abstract class AbstractRendererTogglable extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Togglable $ui, HtmlNode $node ) {
		$node->setAttribute('form', $ui->getTarget()->getName());
	}

}
?>