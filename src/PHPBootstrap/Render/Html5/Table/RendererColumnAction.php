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
		
		$button = new Button($ui->getLabel());
		$button->setIcon($ui->getIcon());
		$button->setStyle($ui->getStyle());
		$button->setSize($ui->getSize());
		$button->setTooltip($ui->getTooltip());
		if ( $ui->getToggle() ) {
			$ui->getToggle()->setParameter('key', $ds->{$ds->getIdentify()} );
		}
		$button->setToggle($ui->getToggle());
		
		if ( $ui->getContext() ) {
			call_user_func($ui->getContext(), $button, $ds->fetch());
		}
		
		$context = new Context();
		$this->toRender($button, $context);
		$node = $context->getResponse();
		if ( $node->getTagName() == 'button' ) {
			$node->setAttribute('type', null);
			$node->setAttribute('disabled', null);
			$attr = $node->getAllAttributes();
			$node->setTagName('a'); 
			$node->setAttribute('href', '#');
			foreach ( $attr as $name => $value ) {
				$node->setAttribute($name, null);
				$node->setAttribute($name, $value);
			}
		}
		if ( $ui->getStyle() === Button::Link ) {
			$node->removeClass('btn');
			$node->removeClass($ui->getStyle());
			$node->removeClass($ui->getSize());
		}
		
		$node->setAttribute('data-column-action', $ui->getName());
				
		$td->addClass('no-border');
		$td->appendNode($node);
	}
	
}
?>