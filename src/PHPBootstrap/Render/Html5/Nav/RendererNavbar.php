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
		
		$container = new HtmlNode('div');
		$container->addClass($ui->getContainer() ? 'container' : 'container-fluid');
		
		foreach ( $ui->getItems() as $item ) {
			if ( $item->getAlign() ) {
				$contents = new HtmlNode('div');
				$this->toRender($item->getElement(), new Context($contents));
				foreach($contents->getAllNodes() as $content ) {
					$content->addClass($item->getAlign());
					$container->appendNode($content);
				}
			} else {
				$this->toRender($item->getElement(), new Context($container));
			}
		}
		
		$inner->appendNode($container);
		$node->appendNode($inner);
	}
	
}
?>