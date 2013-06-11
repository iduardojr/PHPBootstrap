<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Nav\Navbar;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Nav\Nav;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderizador de navegaчуo
 */
class RendererNav extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'ul';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Nav $ui, HtmlNode $node ) {
		$node->addClass('nav');
		
		if ( ! $ui->getParent() instanceof Navbar && $ui->getStyle()) {
			$node->addClass($ui->getStyle());
		}
		
		foreach ( $ui->getItems() as $item ) {
			$li = new HtmlNode('li');
			if ( $ui->getActive() === $item->getElement() ) {
				$li->addClass('active');
			}
			if ( $item->getAlign() ) {
				$li->addClass($item->getAlign());
			}
			$this->toRender($item->getElement(), new Context($li));
			$node->appendNode($li);
		}
	}

}
?>