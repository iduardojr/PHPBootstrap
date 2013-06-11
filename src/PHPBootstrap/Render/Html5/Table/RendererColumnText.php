<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\ColumnText;
use PHPBootstrap\Widget\Table\DataSource;

/**
 * Renderizador de uma coluna de texto
 */
class RendererColumnText extends RendererColumn {
	
	/**
	 *
	 * @see RendererColumn::head()
	 */
	protected function head( ColumnText $ui, HtmlNode $th ) {
		$ds = $ui->getTable()->getDataSource();
		$node = new HtmlNode('span');
		$node->setAttribute('data-order', $ui->getName());
		if ( $ui->getAlign() ) {
			$th->addClass($ui->getAlign());
		}
		$node->appendNode($ui->getLabel());
		
		if ( $ui->getName() == $ds->getOrderKey() ) {
			$node->appendNode('<i class="ui-icon-carat-1-' . ( $ds->getOrderBy() == DataSource::Desc ? 'n' : 's' ) . '"></i>');
		}
		if ( $ui->getToggle() ) {
			$node->setTagName('a');
			$node->setAttribute('href', '#');
			$this->toRender($ui->getToggle(), new Context($node));
		}
		$th->appendNode($node);
	}

	/**
	 *
	 * @see RendererColumn::body()
	 */
	protected function body( ColumnText $ui, HtmlNode $td ) {
		$ds = $ui->getTable()->getDataSource();
		
		$node = new HtmlNode('div');
		$node->addClass('cell');
		if ( $ui->getAlign() ) {
			$node->addClass($ui->getAlign());
		}
		$value = $ds->getData($ui->getName());
		if ( $ui->getFilter() ) {
			$value = call_user_func($ui->getFilter(), $value, $ds->fetch());
		}
		$node->appendNode($value);
		
		$td->appendNode($node);
	}
	
}
?>