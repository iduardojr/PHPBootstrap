<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Nav\Nav;
use PHPBootstrap\Widget\Nav\Tabbable;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;

/**
 * Renderiza conjunto de tab
 */
class RendererTabbable extends RendererWidget {

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
	protected function _render( Tabbable $ui, HtmlNode $node ) {
		$node->addClass('tabbable');
		if ( $ui->getPlacement() ) {
			$node->addClass($ui->getPlacement());
		}
		
		$inner = new HtmlNode('div');
		$inner->addClass('tab-content');
		
		$nav = new Nav($ui->getStyle());
		$nav->setActive($ui->getActiveItem());
		
		foreach ( $ui->getItems() as $item ) {
			$nav->addItem($item->getElement(), $item->getAlign());
			foreach( $item->getPanes() as $pane ) {
				$container = new HtmlNode('div');
				$this->toRender($pane, new Context($container));
				foreach( $container->getAllNodes() as $content ) {
					if ( $ui->getActivePane() === $pane ) {
						$content->addClass('active');
					}
					$inner->appendNode($content);
				}
			}
		}
		$this->toRender($nav, new Context($node));
		
		if ( $ui->getPlacement() === Tabbable::Below ) {
			$node->prependNode($inner);
		} else {
			$node->appendNode($inner);
		}
	}

}
?>