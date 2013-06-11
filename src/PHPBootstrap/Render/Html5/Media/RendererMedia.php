<?php
namespace PHPBootstrap\Render\Html5\Media;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Media\Media;

/**
 * Renderiza midia
 */
class RendererMedia extends RendererWidget {

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
	protected function _render( Media $ui, HtmlNode $node ) {
		$node->addClass('media');
		
		if ( $ui->getImage() ) {
			
			$image = new Context();
			$this->toRender($ui->getImage(), $image);
			$image = $image->getResponse();
			$image->addClass('media-object');
			$image->addClass($ui->getAlign());
			
			if ( $ui->getToggle() ) {
				$anchor = new HtmlNode('a');
				$anchor->setAttribute('href', '#');
				$anchor->appendNode($image);
				$this->toRender($ui->getToggle(), new Context($anchor));
				$image = $anchor;
			}
			
			$node->appendNode($image);
		}
		
		$body = new HtmlNode('div');
		$body->addClass('media-body');
		if ( $ui->getTitle() ) {
			$heading = new Context();
			$this->toRender($ui->getTitle(), $heading);
			$heading = $heading->getResponse();
			$heading->addClass('media-heading');
			$body->appendNode($heading);
		}
		if ( $ui->getBody() ) {
			$this->toRender($ui->getBody(), new Context($body));
		}
		if ( $body->getAllNodes() ) {
			$node->appendNode($body);
		}
	}

}
?>