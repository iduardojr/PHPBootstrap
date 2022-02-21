<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\ChosenBox;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de chosen
 */
class RendererInputChosenBox extends RendererInputComboBox {
	
	/**
	 * 
	 * @see RendererInputComboBox::_render()
	 */
	protected function _render( ChosenBox $ui, HtmlNode $node ) {
		if ( $ui->getMultiple() ) {
			$node->setAttribute('multiple', 'multiple');
		}
		parent::_render($ui, $node);
		$node->setAttribute('data-control', 'ChosenBox');
		$options['allow_single_deselect'] = true;
		$options['placeholder_text_' . ( $ui->getMultiple() ? 'multiple' : 'single' )] = htmlentities($ui->getPlaceholder());
		$options['disable_search_threshold'] = $ui->getDisplaySearchThreshold();
		$options['display_selected_options'] = $ui->getDisplaySelected();
		$options['no_results_text'] = $ui->getTextNoResult();
		$options['max_selected_options'] = $ui->getMaxSelectedOptions();
		$options['inherit_select_classes'] = true;
		$node->setAttribute('data-options', str_replace('"', "&quot;", json_encode($options)));
	}
	
	/**
	 * 
	 * @see RendererInputComboBox::renderName()
	 */
	protected function renderName( ChosenBox $ui, HtmlNode $node ) {
		$node->setAttribute('id', $ui->getName());
		$node->setAttribute('name', $ui->getName() . ( $ui->getMultiple() ? '[]' : '' ) );
	}
}
?>