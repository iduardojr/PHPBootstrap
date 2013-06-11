<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Widget\Pagination\AbstractPaginator;

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
		$node->addClass('table-pagination');
		
		$paginator = $ui->getPaginator();
		$range = $this->getRangeRecords($paginator);
		
		$label = new HtmlNode('div');
		$label->addClass('label');
		
		$label->appendNode('<span class="first">' . $range->start . '</span>');
		$label->appendNode(' - ');
		$label->appendNode('<span class="last">' . $range->end . '</span>');
		$label->appendNode(' de ');
		$label->appendNode('<span class="total">' . $paginator->getTotalRecords() . '</span>');
		
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
				if ( $ui->getPaginator()->getRecordsPerPage() == $limit) {
					$anchor->addClass('badge-important');
				}
				$anchor->appendNode($limit);
				$toggle->setParameter('limit', $limit);
				$this->toRender($toggle, new Context($anchor));
				
				$div->appendNode($anchor);
				
			}
			
			$node->appendNode($div);
		}
		
		$this->toRender($ui->getPaginator(), new Context($node));
		
	}
	
	/**
	 * Obtem intervalo de registros
	 * 
	 * @param AbstractPaginator $pager
	 * @return \stdClass
	 */
	private function getRangeRecords( AbstractPaginator $pager ) {
		$range = new \stdClass();
		$range->start = $pager->getTotalRecords() ? 1 : 0;
		$range->end = $pager->getTotalRecords();
	
		if ( $pager->getRecordsPerPage() < $pager->getTotalRecords() ) {
	
			$range->start = ( $pager->getCurrentPage() - 1 ) * $pager->getRecordsPerPage() + 1;
			$range->end = $range->start +  $pager->getRecordsPerPage() - 1;
	
			if ( $range->start < 1 ) {
				$range->start = 1;
				$range->end = $pager->getRecordsPerPage();
			}
	
			if ( $range->end > $pager->getTotalRecords() ) {
				$range->end = $pager->getTotalRecords();
			}
		}
	
		return $range;
	}

}
?>