<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\ColumnSelect;

/**
 * Renderizador de uma coluna de selecao
 */
class RendererColumnSelect extends RendererColumn {
	
	/**
	 *
	 * @see RendererColumn::head()
	 */
	protected function head( ColumnSelect $ui, HtmlNode $th ) {
		if ( $ui->getLabel() ) {
			$node = new HtmlNode('a');
			$node->setAttribute('href', '#');
			$node->appendNode($ui->getLabel());
		} else {
			$node = new HtmlNode('input', true);
			$node->setAttribute('type', 'checkbox');
		}
		$this->toRender($ui->getToggle(), new Context($node));
		$th->appendNode($node);
	}

	/**
	 *
	 * @see RendererColumn::body()
	 */
	protected function body( ColumnSelect $ui, HtmlNode $td ) {
		$ds = $ui->getTable()->getDataSource();
		
		$node = new HtmlNode('input', true);
		$node->setAttribute('type', 'checkbox');
		$node->setAttribute('name', $ui->getName() . '[]');
		
		if ( $ui->getForm() ) {
			$node->setAttribute('form', $ui->getForm()->getName());
		}
		
		if ( $ui->getContextChecked() && call_user_func($ui->getContextChecked(), $ds->fetch(), $ds->getIdentify()) ) {
			$node->setAttribute('checked', 'checked');
		}
		
		if ( $ui->getContextEnabled() && !call_user_func($ui->getContextEnabled(), $ds->fetch(), $ds->getIdentify()) ) {
			$node->setAttribute('disabled', 'disabled');
		}
		
		$node->setAttribute('value', $ds->getIdentify());
		
		$td->appendNode($node);
	}
	
}
?>