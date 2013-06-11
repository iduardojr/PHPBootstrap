<?php
namespace PHPBootstrap\Render\Html5\Form;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Form;

/**
 * Renderizador do formulario
 */
class RendererForm extends RendererWidget {

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
	protected function _render( Form $ui, HtmlNode $node ) {
		$ui->prepare();
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		foreach ( $ui->getIterator() as $child ) {
			$this->toRender($child, new Context($node));
		}
		
		$action = new HtmlNode('div');
		$action->addClass('form-actions');
		foreach ( $ui->getButtons() as $btn ) {
			$this->toRender($btn, new Context($action));
			$action->appendNode(' ');
		}
		if ( $action->getAllNodes() ) {
			$node->appendNode($action);
		}
		$form = new HtmlNode('form');
		$form->setAttribute('name', $ui->getName());
		$form->setAttribute('method', $ui->getMethod());
		$form->setAttribute('enctype', $ui->getEncoding());
		$node->appendNode($form);
	}

}
?>