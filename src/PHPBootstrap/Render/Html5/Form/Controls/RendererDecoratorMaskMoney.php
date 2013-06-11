<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de uma mascara de dinheiro
 */
class RendererDecoratorMaskMoney extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( MaskMoney $ui, HtmlNode $node ) {
		$format['symbol'] = $ui->getSymbol();
		$format['showSymbol'] = ( bool ) $ui->getSymbol();
		$format['symbolStay'] = ( bool ) $ui->getSymbol();
		$format['thousands'] = $ui->getThousands();
		$format['decimal'] = $ui->getDecimal();
		$format['precision'] = $ui->getPrecision();
		$format['defaultZero'] = $ui->getDefaultZero();
		$format['allowZero'] = $ui->getDefaultZero();
		$format['allowNegative'] = $ui->getAllowNegative();
		$node->setAttribute('data-mask-money', str_replace('"', "&quot;", json_encode($format)));
	}

}
?>