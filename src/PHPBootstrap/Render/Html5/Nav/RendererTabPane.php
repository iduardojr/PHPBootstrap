<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Nav\TabPane;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Context;

/**
 * Renderiza Painel do tab
 */
class RendererTabPane extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TabPane $ui, HtmlNode $node ) {
		$pane = new HtmlNode('div');
		$pane->setAttribute('id', $ui->getIdentify());
		$pane->addClass('tab-pane');
		if ( $ui->getContent() instanceof Widget ) {
			$this->toRender($ui->getContent(), new Context($pane));
		} else {
			$pane->appendNode($ui->getContent());
		}
		$node->appendNode($pane);
	}

}
?>