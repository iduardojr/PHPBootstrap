<?php
namespace PHPBootstrap\Render\Html5\Nav;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Nav\NavBrand;
use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererDependsResponse;

/**
 * Barra de Navegaчуo
 */
class RendererNavBrand extends RendererDependsResponse {
	
	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( NavBrand $ui, HtmlNode $node ) {
		$brand = new HtmlNode('a');
		$brand->setAttribute('href', '#');
		if ( $ui->getContent() instanceof Widget ) {
			$this->toRender($ui->getContent(), new Context($brand));
		} else {
			$brand->appendNode($ui->getContent());
		}
		if ( $ui->getToggle() ) {
			$this->toRender($ui->getToggle(), new Context($brand));
		}
		$brand->addClass('brand');
		$node->appendNode($brand);
	}
	
}
?>