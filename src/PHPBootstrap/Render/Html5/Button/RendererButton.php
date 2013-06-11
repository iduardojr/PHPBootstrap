<?php
namespace PHPBootstrap\Render\Html5\Button;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Button\Button;

/**
 * Renderiza botao
 */
class RendererButton extends RendererWidget {
	
	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'button';
	
	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( Button $ui, HtmlNode $node ) {
		$node->setAttribute('type', 'button');
		$node->addClass('btn');
		
		if ( $ui->getBlock() ) {
			$node->addClass('btn-block');
		}
		
		if ( $ui->getSize() ) {
			$node->addClass($ui->getSize());
		}
		
		if ( $ui->getStyle() ) {
			$node->addClass($ui->getStyle());
		}
		
		if ( $ui->getDisabled() ) {
			$node->addClass('disabled');
			$node->setAttribute('disabled', 'disabled');
		}
		
		if ( $ui->getIcon() ) {
			$this->toRender($ui->getIcon(), new Context($node));
		}
		
		if ( $ui->getLabel() ) {
			$node->appendNode($ui->getLabel());
		}
		
		if ( $ui->getTooltip() ) {
			$this->toRender($ui->getTooltip(), new Context($node));
		}
		
		if ( $ui->getToggle() ) {
			$this->toRender($ui->getToggle(), new Context($node));
		} 
		
		if ( $node->getTagName() == 'a') {
			$node->setAttribute('type', null);
			$node->setAttribute('disabled', null);
		} elseif ( $node->hasClass('dropdown') || $node->hasClass('dropup')) {
			$node->addClass('btn-group');
			$node->removeClass('dropdown');
		} 
	}
}
?>