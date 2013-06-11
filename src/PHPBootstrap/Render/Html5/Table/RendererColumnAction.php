<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Widget\Button\Button;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\ColumnAction;

/**
 * Renderizador de uma coluna de acao
 */
class RendererColumnAction extends RendererColumn {
	
	/**
	 *
	 * @see RendererColumn::head()
	 */
	protected function head( ColumnAction $ui, HtmlNode $th ) {
		$th->addClass('no-border');
	}

	/**
	 *
	 * @see RendererColumn::body()
	 */
	protected function body( ColumnAction $ui, HtmlNode $td ) {
		$ds = $ui->getTable()->getDataSource();
		
		$node = new HtmlNode('a');
		$node->setAttribute('href', '#');
		
		if ( $ui->getStyle() != Button::Link ) {
			$node->addClass('btn');
			$node->addClass($ui->getStyle());
			if ( $ui->getSize() ) {
				$node->addClass($ui->getSize());
			}
		}
		
		if ( $ui->getContextEnabled() && !call_user_func($ui->getContextEnabled(), $ds->fetch()) ) {
			$node->addClass('disabled');
		}

		if ( $ui->getIcon() ) {
			$this->toRender($ui->getIcon(), new Context($node));
		}
		
		if ( $ui->getLabel() ) {
			$node->appendNode($ui->getLabel());
		}
		
		if ( $ui->getTooltip() ) {
			$this->toRender($ui->getTooltip(), new Context($node));
		}
		
		if ( $ui->getToggle() ) {
			$toggle = clone $ui->getToggle();
			$toggle->setParameter('key', $ds->getData($ds->getIdentify()) );
			$this->toRender($toggle, new Context($node));
		}
	
		$node->setAttribute('data-column-action', $ui->getName());
				
		$td->addClass('no-border');
		$td->appendNode($node);
	}
	
}
?>