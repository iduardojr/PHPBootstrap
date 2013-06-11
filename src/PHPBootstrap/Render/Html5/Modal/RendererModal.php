<?php
namespace PHPBootstrap\Render\Html5\Modal;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Modal\Modal;

/**
 * Renderiza modal
 */
class RendererModal extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 *
	 * @see RendererWrapper::_render()
	 */
	protected function _render( Modal $ui, HtmlNode $node ) {
		$node->addClass('modal');
		
		if ( $ui->getHide() ) {
			$node->addClass('fade hide');
		}
		
		if ( $ui->getWidth() ) {
			$node->addStyle('width', $ui->getWidth() . 'px');
			$node->addStyle('margin-left', '-' . ceil($ui->getWidth() / 2) . 'px');
		}
		
		$header = new HtmlNode('div');
		$header->addClass('modal-header');
		$header->appendNode('<a href="#" class="close" data-dismiss="modal">&times;</a>');
		$this->toRender($ui->getTitle(), new Context($header));
		$node->appendNode($header);
		
		$body = new HtmlNode('div');
		$body->addClass('modal-body');
		if ( $ui->getHeight() ) {
			$body->addStyle('height', $ui->getHeight() . 'px');
		}
		if ( $ui->getBody() ) {
			$this->toRender($ui->getBody(), new Context($body));
		}
		$node->appendNode($body);
		
		$footer = new HtmlNode('div');
		$footer->addClass('modal-footer');
		foreach ( $ui->getButtons() as $button ) {
			$this->toRender($button, new Context($footer));
		}
		if ( $footer->getAllNodes() ) {
			$node->appendNode($footer);
		}
	}

}
?>