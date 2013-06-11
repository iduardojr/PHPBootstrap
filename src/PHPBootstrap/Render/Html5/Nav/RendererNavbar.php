<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Nav\Navbar;

/**
 * Barra de Navegaчуo
 */
class RendererNavbar extends RendererWidget {
	
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
	protected function _render( Navbar $ui, HtmlNode $node ) {
		$node->addClass('navbar');
	
		if ( $ui->getDisplay() ) {
			$node->addClass( $ui->getDisplay() );
		}
	
		if ( $ui->getInverse() ) {
			$node->addClass('navbar-inverse');
		}
	
		$inner = new HtmlNode('div');
		$inner->addClass('navbar-inner');
		
		foreach ( $ui->getItems() as $item ) {
			if ( $item->getAlign() ) {
				$container = new HtmlNode('div');
				$this->toRender($item->getElement(), new Context($container));
				foreach($container->getAllNodes() as $content ) {
					$content->addClass($item->getAlign());
					$inner->appendNode($content);
				}
			} else {
				$this->toRender($item->getElement(), new Context($inner));
			}
		}
		
		$node->appendNode($inner);
	}
	
}
?>