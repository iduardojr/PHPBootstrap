<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Table\Table;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;

/**
 * Renderiza uma tabela
 */
class RendererTable extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'table';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Table $ui, HtmlNode $node ) {
		$node->addClass('table');
		
		if ( $ui->getStyles() ) {
			$node->addClass(implode(' ', $ui->getStyles()));
		}
		
		if ( $ui->getCaption() ) {
			$node->appendNode('<caption>' . $ui->getCaption() . '</caption>');
		}
		
		$thead = new HtmlNode('thead');
		$tbody = new HtmlNode('tbody');
		$tfoot = new HtmlNode('tfoot');
		
		if ( $ui->getColumns() ) {
			
			$count = 0;
			$tr = new HtmlNode('tr');
			
			foreach ( $ui->getColumns() as $column ) {
				$cell = new HtmlNode('th');
				$this->toRender($column, new Context($cell));
				$tr->appendNode($cell);
				$count++;
			}
			$thead->appendNode($tr);
			$node->appendNode($thead);
			
			$ds = $ui->getDataSource();
					
			$ds->reset();
			if ( $ds->getTotal() ) {
				while ( $ds->next() ) {
					$tr = new HtmlNode('tr');
					if ( $ui->getContextRow() ) {
						$class = call_user_func($ui->getContextRow(), $ds->fetch());
						if ( $class ) {
							$tr->addClass($class);
						}
					}
					foreach ( $ui->getColumns() as $column ) {
						$cell = new HtmlNode('td');
						$this->toRender($column, new Context($cell));
						$tr->appendNode($cell);
					}
					$tbody->appendNode($tr);
				}
				$node->appendNode($tbody);
				
			} elseif ( $ui->getAlertNoRecords() ) {
				$cell = new HtmlNode('td');
				if ( $count > 1 ) {
					$cell->setAttribute('colspan', $count);
				}
				$cell->appendNode($ui->getAlertNoRecords());
				
				$tr = new HtmlNode('tr');
				$tr->appendNode($cell);
				$tfoot->appendNode($tr);
			}
			
			if ( $ui->getFooter() ) {
				$cell = new HtmlNode('td');
				if ( $count > 1 ) {
					$cell->setAttribute('colspan', $count);
				}
				$this->toRender($ui->getFooter(), new Context($cell));
				
				$tr = new HtmlNode('tr');
				$tr->addClass('table-footer');
				$tr->appendNode($cell);
				
				$tfoot->appendNode($tr);
			}
			
			$pagination = $ui->getPagination();
			
			if ( $pagination ) {
				
				$cell = new HtmlNode('td');
				if ( $count > 1 ) {
					$cell->setAttribute('colspan', $count);
				}
				$this->toRender($pagination, new Context($cell));
				
				$tr = new HtmlNode('tr');
				$tr->addClass('table-paginator');
				$tr->appendNode($cell);
				
				$tfoot->appendNode($tr);
				
			}
			
			if ( $tfoot->getAllNodes() ) {
				$node->appendNode($tfoot);
			}
		}
		
	}

}
?>