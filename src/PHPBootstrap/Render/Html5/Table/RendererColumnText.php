<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\ColumnText;
use PHPBootstrap\Widget\Table\DataSource;
use PHPBootstrap\Widget\Widget;

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
		$node->setAttribute('data-sort', $ui->getName());
		if ( $ui->getAlign() ) {
			$th->addClass($ui->getAlign());
		}
		$node->appendNode($ui->getLabel());
		$sort = explode('.', $ds->getSort());
		if ( $ui->getName() == $ds->getSort() || ( isset($sort[1]) && $ui->getName() == $sort[1]) ) {
			$node->appendNode('<i class="ui-icon-carat-1-' . ( $ds->getOrder() == DataSource::Desc ? 'n' : 's' ) . '"></i>');
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
		$value = $ds->{$ui->getName()};
		if ( $ui->getFilter() ) {
			$value = call_user_func($ui->getFilter(), $value, $ds->fetch(), $ds->getIdentify());
		}
		if ( $value instanceof Widget ) {
			$value = $this->toRender($value, new Context($node));
		} elseif (is_object($value) && method_exists( $value, '__toString')) {
			$node->appendNode((string) $value);
		} else {
		    $node->appendNode($value);
		}
		
		$td->appendNode($node);
	}
	
}
?>