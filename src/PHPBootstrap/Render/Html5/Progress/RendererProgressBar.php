<?php
namespace PHPBootstrap\Render\Html5\Progress;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Progress\ProgressBar;

/**
 * Renderiza barra de progresso
 */
class RendererProgressBar extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see Renderer::_render()
	 */
	protected function _render( ProgressBar $ui, HtmlNode $node ) {
		$node->addClass('progress');
		
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		
		foreach ( $ui->getBars() as $bar ) {
			$this->toRender($bar, new Context($node));
		}
	}

}
?>