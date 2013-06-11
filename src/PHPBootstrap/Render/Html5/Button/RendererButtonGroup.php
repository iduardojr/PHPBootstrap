<?php
namespace PHPBootstrap\Render\Html5\Button;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Button\ButtonGroup;

/**
 * Renderiza um grupo de botoes
 */
class RendererButtonGroup extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( ButtonGroup $ui, HtmlNode $node ) {
		$node->addClass('btn-group');
		
		if ( $ui->getVertical() ) {
			$node->addClass('btn-group-vertical');
		}
		foreach ( $ui->getButtons() as $button ) {
			$context = new Context();
			$this->toRender($button, $context);
			$inner = $context->getResponse();
			if ( $inner->hasClass('btn-group') ) {
				foreach ( $inner->getAllNodes() as $item ) {
					$node->appendNode($item);
				}
				if ( $inner->hasClass('dropup') ) {
					$node->addClass('dropup');
				}
			} else {
				$node->appendNode($inner);
			}
		}
	}

}
?>