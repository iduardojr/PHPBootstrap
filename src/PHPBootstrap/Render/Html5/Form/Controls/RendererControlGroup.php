<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\ControlGroup;

/**
 * Renderizador de Grupo de controle
 */
class RendererControlGroup extends RendererWidget {

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
	protected function _render( ControlGroup $ui, HtmlNode $node ) {
		$node->addClass('control-group');
		if ( $ui->getSeverity() ) {
			$node->addClass($ui->getSeverity());
		}
		if ( $ui->getLabel() ) {
			$context = new Context();
			$this->toRender($ui->getLabel(), $context);
			$label = $context->getResponse();
			$label->addClass('control-label');
			$node->appendNode($label);
		}
		$inner = new HtmlNode('div');
		$inner->addClass('controls');
		if ( count($ui) > 1 ) {
			$inner->addClass('controls-row');
		}
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($inner));
		}
		if ( $ui->getHelp() ) {
			$this->toRender($ui->getHelp(), new Context($inner));
		}
		$node->appendNode($inner);
	}

}
?>