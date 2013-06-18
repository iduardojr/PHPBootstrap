<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\TablePagination;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderizador de paginação da tabela
 */
class RendererTablePagination extends RendererWidget {

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
	protected function _render( TablePagination $ui, HtmlNode $node ) {
		$node->addClass('table-pagination form-actions');
		
		$range = $ui->getPaginator()->getRange();
		$total = $ui->getPaginator()->getTotal();
		
		$label = new HtmlNode('div');
		$label->addClass('label');
		
		$label->appendNode('<span class="first">' . $range[0] . '</span>');
		$label->appendNode(' - ');
		$label->appendNode('<span class="last">' . $range[1] . '</span>');
		$label->appendNode(' de ');
		$label->appendNode('<span class="total">' . $total . '</span>');
		
		$node->appendNode($label);
		$node->appendNode('<div class="loading"></div>');
		
		if ( $ui->getLimits() ) {
			$div = new HtmlNode('div');
			$div->addClass('limit');
			$div->appendNode('Por p&aacute;gina:');
			$toggle = $ui->getToggleLimits();
			
			foreach ( $ui->getLimits() as $limit ) {
				$anchor = new HtmlNode('a');
				$anchor->setAttribute('href', '#');
				$anchor->addClass('badge');
				if ( $ui->getPaginator()->getLimit() == $limit) {
					$anchor->addClass('badge-important');
				}
				$anchor->appendNode($limit);
				$toggle->setParameter('limit', $limit);
				$this->toRender($toggle, new Context($anchor));
				
				$div->appendNode($anchor);
				
			}
			
			$node->appendNode($div);
		}
		
		$this->toRender($ui->getPagination(), new Context($node));
		
	}
	
}
?>