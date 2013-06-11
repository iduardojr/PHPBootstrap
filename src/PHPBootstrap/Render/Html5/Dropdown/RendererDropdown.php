<?php
namespace PHPBootstrap\Render\Html5\Dropdown;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Dropdown\Dropdown;

/**
 * Renderizador do dropdown
 */
class RendererDropdown extends RendererWidget {

	/**
	 * Nome da tag
	 *
	 * @var string
	 */
	const TAGNODE = 'ul';

	/**
	 *
	 * @see RendererWidget::_render()
	 */
	protected function _render( Dropdown $ui, HtmlNode $node ) {
		$node->addClass('dropdown-menu');
		
		if ( $ui->getAlign() ) {
			$node->addClass($ui->getAlign());
		}
		
		foreach ( $ui->getItems() as $item ) {
			$li = new HtmlNode('li');
			$this->toRender($item, new Context($li));
			$node->appendNode($li);
		}
	}

}
?>