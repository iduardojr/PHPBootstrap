<?php
namespace PHPBootstrap\Render\Html5\Thumbnail;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Thumbnail\Thumbnail;

/**
 * Renderiza miniaturas
 */
class RendererThumbnail extends RendererWidget {

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
	protected function _render( Thumbnail $ui, HtmlNode $node ) {
		$node->addClass('thumbnail');
		$image = new Context();
		$this->toRender($ui->getImage(), $image);
		$image = $image->getResponse();
		
		if ( $ui->getCaption() ) {
			if ( $ui->getToggle() ) {
				$anchor = new HtmlNode('a');
				$anchor->setAttribute('href', '#');
				$anchor->appendNode($image);
				$this->toRender($ui->getToggle(), new Context($anchor));
				$image = $anchor;
			}
			if ( $ui->getTooltip() ) {
				$this->toRender($ui->getTooltip(), new Context($image));
			}
			$node->appendNode($image);
			$caption = new HtmlNode('div');
			$caption->addClass('caption');
			$this->toRender($ui->getCaption(), new Context($caption));
			$node->appendNode($caption);
		} else {
			$node->setTagName('a');
			$node->setAttribute('href', '#');
			$node->appendNode($image);
			if ( $ui->getToggle() ) {
				$this->toRender($ui->getToggle(), new Context($node));
			}
			if ( $ui->getTooltip() ) {
				$this->toRender($ui->getTooltip(), new Context($node));
			}
		}
	}

}
?>