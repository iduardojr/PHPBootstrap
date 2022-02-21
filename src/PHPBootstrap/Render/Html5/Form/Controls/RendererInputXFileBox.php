<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Render\Html5\RendererWidget;
use PHPBootstrap\Widget\Form\Controls\XFileBox;
use PHPBootstrap\Widget\Widget;

/**
 * Renderizador de xfilebox
 */
class RendererInputXFileBox extends RendererWidget {

	/**
	 * Nome da Tag
	 *
	 * @var string
	 */
	const TAGNODE = 'div';

	/**
	 * 
	 * @see RendererWidget::_render()
	 */
	protected function _render( XFileBox $ui, HtmlNode $node ) {
		$node->addClass('input-append');
		
		$file = new HtmlNode('input', true);
		$file->setAttribute('type', 'file');
		if ( $ui->getName() ) {
			$file->setAttribute('name', $ui->getName());
		}
		$file->addClass('hide');
		
		$text = new HtmlNode('input', true);
		$text->setAttribute('type', 'text');
		if ( $ui->getSpan() ) {
			$text->addClass('span' . $ui->getSpan());
		}
		$text->setAttribute('readonly', 'readonly');
		if ( $ui->getPlaceholder() ) {
			$text->setAttribute('placeholder', $ui->getPlaceholder());
		}
		$text->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		
		$button = new HtmlNode('button');
		$button->setAttribute('type', 'button');
		$button->addClass('btn');
		if ( $ui->getButtonStyle() ) {
			$button->addClass($ui->getButtonStyle());
		}
		$button->appendNode($ui->getLabelAdd());
		
		if ( $ui->getDisabled() ) {
			$node->addClass('disabled');
			$file->setAttribute('disabled', 'disabled');
			$button->setAttribute('disabled', 'disabled');
		}
		
		if ( $ui->getForm() ) {
			$file->setAttribute('form', $ui->getForm()->getName());
		}
		$file->setAttribute('autocomplete', $ui->getAutoComplete() ? 'on' : 'off');
		$this->toRender($ui->getValidate(), new Context($file));
		
		$node->appendNode($text);
		$node->appendNode($file);
		$node->appendNode($button);
		
		$node->setAttribute('data-control', 'XFileBox');
		$node->setAttribute('data-label-add', htmlentities($ui->getLabelAdd()));
		$node->setAttribute('data-label-clear', htmlentities($ui->getLabelClear()));
	}
	
	
}
?>