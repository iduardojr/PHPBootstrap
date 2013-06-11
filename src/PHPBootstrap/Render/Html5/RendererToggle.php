<?php
namespace PHPBootstrap\Render\Html5;

use PHPBootstrap\Widget\Toggle\Togglable;

/**
 * Renderiza Alternadores
 */
abstract class RendererToggle extends RendererDependsResponse {

	/**
	 * Obtem nome do toggle
	 *
	 * @return string
	 */
	protected function getToggleName() {
		return constant(get_class($this) . '::TOGGLENAME');
	}

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Togglable $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', $this->getToggleName());
	}

}
?>