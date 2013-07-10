<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Widget\Misc\Breadcrumb;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;

/**
 * Renderiza migalhas de pao
 */
class RendererBreadcrumb extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'ul';

	/**
	 *
	 * @see Renderer::_render()
	 */
	protected function _render( Breadcrumb $ui, HtmlNode $node ) {
		$node->addClass('breadcrumb');
		
		$iterator = $ui->getItems();
		$iterator->rewind();
		while ( $iterator->valid() ) {
			$item = $iterator->current();
			$li = new HtmlNode('li');
			if ( is_array($item) ) {
				$anchor = new HtmlNode('a');
				$anchor->appendNode($item['text']);
				$this->toRender($item['toggle'], new Context($anchor));
				$item = $anchor;
			}
			$li->appendNode($item);
			$iterator->next();
			if ( ! $iterator->valid() ) {
				if ( $ui->getActive() ) {
					$li->addClass('active');
				}
			} else {
				$li->appendNode(' <span class="divider">' . $ui->getDivider() . '</span>');
			}
			$node->appendNode($li);
		}
	}

}
?>