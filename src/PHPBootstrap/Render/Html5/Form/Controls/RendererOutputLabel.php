<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Label;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador de rotulo
 */
class RendererOutputLabel extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'label';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Label $ui, HtmlNode $node ) {
		if ( $ui->getTarget() ) {
			$node->setAttribute('for', $ui->getTarget()->getName());
		}
		$node->appendNode($ui->getText());
	}

}
?>