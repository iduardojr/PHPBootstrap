<?php
namespace PHPBootstrap\Render\Html5;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Renderer;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador
 */
abstract class RendererWidget extends Renderer {

	/**
	 *
	 * @see Renderer::render()
	 */
	public function render( Widget $ui, Context $context ) {
		$node = $this->createNode($ui);
		if ( $ui->getName() ) {
			$this->renderName($ui, $node);
		}
		$this->_render($ui, $node);
		if ( $context->getResponse() ) {
			$context->getResponse()->appendNode($node);
		} else {
			$context->setResponse($node);
		}
	}

	/**
	 * Renderiza nome
	 *
	 * @param Widget $ui
	 * @param HtmlNode $node
	 */
	protected function renderName( Widget $ui, HtmlNode $node ) {
		$node->setAttribute('id', $ui->getName());
	}

	/**
	 * Cria nу
	 *
	 * @param Widget $ui
	 * @return HtmlNode
	 */
	protected function createNode( Widget $ui ) {
		return new HtmlNode(constant(get_class($this) . '::TAGNODE'));
	}

	/**
	 * Especializa a renderizaзгo do nу
	 *
	 * @param Widget $ui
	 * @param HtmlNode $node
	 */
	protected function _render( Widget $ui, HtmlNode $node ) {
	}

}
?>