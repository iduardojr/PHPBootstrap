<?php
namespace PHPBootstrap\Render\Html5\Table;

use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Widget\Table\Column;

/**
 * Renderizador de coluna
 */
abstract class RendererColumn extends RendererDependsResponse {

	/**
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Column $ui, HtmlNode $response ) {
		if ( $response->getTagName() == 'th' ) {
			$this->head($ui, $response);
			if ( $ui->getSpan() > 12 ) {
				$response->addStyle('width', $ui->getSpan() . 'px');	
			} elseif ( $ui->getSpan() > 0 ) {
				$response->addClass('span' . $ui->getSpan());
			}
		} else {
			$this->body($ui, $response);
		}
	}
	

	/**
	 * Renderiza um cabeçalho
	 *
	 * @param Column $ui
	 * @param HtmlNode $th
	 */
	protected function head( Column $ui, HtmlNode $th ) {
		
	}

	/**
	 * Renderiza um corpo
	 *
	 * @param Column $ui
	 * @param HtmlNode $td
	 */
	protected function body( Column $ui, HtmlNode $td ){
		
	}

}
?>