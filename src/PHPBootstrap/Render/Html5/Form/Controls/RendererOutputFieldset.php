<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Fieldset;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;

/**
 * Renderizador de rotulo
 */
class RendererOutputFieldset extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'fieldset';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Fieldset $ui, HtmlNode $node ) {
		$node->appendNode('<legend>' . $ui->getLegend() . '</legend>');
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
	}

}
?>