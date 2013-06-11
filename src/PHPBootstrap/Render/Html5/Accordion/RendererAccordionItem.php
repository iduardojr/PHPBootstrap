<?php
namespace PHPBootstrap\Render\Html5\Accordion;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Accordion\AccordionItem;

/**
 * Renderiza item do accordion
 */
class RendererAccordionItem extends RendererWidget {

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
	protected function _render( AccordionItem $ui, HtmlNode $node ) {
		$node->addClass('accordion-group');
		
		$heading = new HtmlNode('div');
		$heading->addClass('accordion-heading');
		
		$anchor = new HtmlNode('a');
		$anchor->addClass('accordion-toggle');
		$anchor->appendNode($ui->getTitle());
		$anchor->setAttribute('href', '#');
		if ( $ui->getToggle() ) {
			$this->toRender($ui->getToggle(), new Context($anchor));
		}
		$heading->appendNode($anchor);
		$node->appendNode($heading);
		
		if ( $ui->getBody() ) {
			$body = new HtmlNode('div');
			$body->setAttribute('id', $ui->getIdentify());
			$body->addClass('accordion-body');
			$body->addClass('collapse');
			if ( $ui->getOpen() ) {
				$body->addClass('in');
			}
			
			$inner = new HtmlNode('div');
			$inner->addClass('accordion-inner');
			$this->toRender($ui->getBody(), new Context($inner));
			$body->appendNode($inner);
			$node->appendNode($body);
		}
	}

}
?>