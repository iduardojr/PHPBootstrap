<?php
namespace PHPBootstrap\Render\Html5\Misc;

use PHPBootstrap\Widget\Misc\Descriptions;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderizador de descrições
 */
class RendererDescriptions extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'dl';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Descriptions $ui, HtmlNode $node ) {
		if ( $ui->getHorizontal() ) {
			$node->addClass('dl-horizontal');
		}
		
		foreach ( $ui->getTerms() as $term => $description ) {
			$dt = new HtmlNode('dt');
			$dd = new HtmlNode('dd');
			
			$dt->appendNode($term);
			$dd->appendNode($description);
			
			$node->appendNode($dt);
			$node->appendNode($dd);
		}
	}

}
?>