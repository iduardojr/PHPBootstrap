<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Misc\Alert;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador de mensagem
 */
class RendererAlert extends RendererWidget {

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
	protected function _render( Alert $ui, HtmlNode $node ) {
		$node->addClass('alert');
		
		if ( $ui->getSeverity() ) {
			$node->addClass($ui->getSeverity());
		}
		
		if ( $ui->getBlock() ) {
			$node->addClass('alert-block');
		}
		
		if ( $ui->getAnimation() ) {
			$node->addClass('fade in');
		}
		
		if ( $ui->getClosable() ) {
			$node->appendNode('<a href="#" class="close" data-dismiss="alert">&times;</a>');
		}
		if ( $ui->getMessage() instanceof Widget ) {
			$this->toRender($ui->getMessage(), new Context($node));
		} else {
			$node->appendNode($ui->getMessage());
		}
	}

}
?>