<?php
namespace PHPBootstrap\Render\Html5\Thumbnail;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Thumbnail\ThumbnailList;

/**
 * Renderiza lista de miniaturas
 */
class RendererThumbnailList extends RendererWidget {

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
	protected function _render( ThumbnailList $ui, HtmlNode $node ) {
		$node->addClass('thumbnails');
		foreach ( $ui->getThumbnails() as $thumbnail ) {
			$li = new HtmlNode('li');
			$li->addClass('span' . $ui->getSpan());
			$this->toRender($thumbnail, new Context($li));
			$node->appendNode($li);
		}
	}

}
?>