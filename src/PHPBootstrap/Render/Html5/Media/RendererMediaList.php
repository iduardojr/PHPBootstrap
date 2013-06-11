<?php
namespace PHPBootstrap\Render\Html5\Media;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Media\MediaList;

/**
 * Renderiza uma lista de midias
 */
class RendererMediaList extends RendererWidget {

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
	protected function _render( MediaList $ui, HtmlNode $node ) {
		$node->addClass('media-list');
		foreach ( $ui->getMedias() as $item ) {
			$context = new Context();
			$this->toRender($item, $context);
			$inner = $context->getResponse();
			$inner->setTagName('li');
			$node->appendNode($inner);
		}
	}

}
?>