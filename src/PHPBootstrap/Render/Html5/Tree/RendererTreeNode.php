<?php
namespace PHPBootstrap\Render\Html5\Tree;

use PHPBootstrap\Widget\Tree\TreeNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador de nó da arvore
 */
class RendererTreeNode extends RendererDependsResponse {
	
	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( TreeNode $ui, HtmlNode $node ) {
		$li = new HtmlNode('li');

		$li->setAttribute('id', $ui->getIdentify());
		$hitarea = new HtmlNode('i');
		$hitarea->addClass('hitarea');
		$hitarea->setAttribute('data-toggle', 'tree');
		$li->appendNode($hitarea);
		
		$span = new HtmlNode('span');
		$span->addClass('tree-node');
		
		$span->setAttribute('data-value', is_array($ui->getValue()) ? str_replace('"', "&quot;", json_encode($this->encode($ui->getValue()))) : $ui->getValue());
		if ( $ui->getLabel() instanceof Widget ) {
			$this->toRender($ui->getLabel(), new Context($span));
		} else {
			$span->appendNode($ui->getLabel());
		}
		$li->appendNode($span);
		
		foreach( $ui->getButtons() as $button ) {
			$this->toRender($button, new Context($span));
		}
		
		$ul = new HtmlNode('ul');
		if ( ! $ui->isLeaf() ) {
			$li->addClass($ui->getOpened() ? 'collapsable' : 'expandable');
			foreach( $ui->getNodes() as $item ) {
				$this->toRender($item, new Context($ul));
			}
		}
		$li->appendNode($ul);
		
		$node->appendNode($li);
	}
	
	/**
	 * Codifica os valores
	 *
	 * @param mixed $data
	 */
	private function encode( $data ) {
		if ( is_scalar($data) ) {
			return utf8_encode($data);
		} elseif ( is_array($data)) {
			foreach( $data as $key => $value ) {
				$data[$key] = $this->encode($value);
			}
		}
		return $data;
	}
}
?>