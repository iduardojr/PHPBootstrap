<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\AbstractInputList;

/**
 * Renderizador de um lista de opчѕes
 */
class AbstractRendererInputList extends RendererWidget {

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( AbstractInputList $ui, HtmlNode $node ) {
		foreach ( $ui->getOptions() as $value => $label ) {
			$node->appendNode($this->renderOption($ui, $value, $label));
		}
	}

	/**
	 * Renderiza uma opчуo
	 *
	 * @param AbstractInputList $ui
	 * @param string $value
	 * @param string $label
	 * @return HtmlNode
	 */
	protected function renderOption( AbstractInputList $ui, $value, $label ) {
	}

}
?>