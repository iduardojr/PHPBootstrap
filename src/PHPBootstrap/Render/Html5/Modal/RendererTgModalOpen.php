<?php
namespace PHPBootstrap\Render\Html5\Modal;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Widget\Modal\TgModalOpen;
use PHPBootstrap\Widget\Modal\Modal;

/**
 * Renderiza alternador que abri o modal
 */
class RendererTgModalOpen extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( TgModalOpen $ui, HtmlNode $node ) {
		$node->setAttribute('data-toggle', 'modal-open');
		$node->setAttribute('data-target', '#' . ($ui->getTarget() instanceof Modal ? $ui->getTarget()->getName() : $ui->getTarget()));
		
		if ( $ui->getAssignable() ) {
			$this->toRender($ui->getAssignable(), new Context($node));
		}
	}

}
?>