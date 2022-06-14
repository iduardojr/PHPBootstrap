<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\Validate;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Validate\Requirable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputContext;
use PHPBootstrap\Widget\Form\Controls\AbstractInputChecked;
use PHPBootstrap\Widget\Form\Controls\AbstractTextBoxComponent;
use PHPBootstrap\Widget\Form\Controls\ComboBox;
use PHPBootstrap\Widget\Form\Controls\AbstractInputList;
use PHPBootstrap\Widget\Form\Controls\AbstractInputListChecked;
use PHPBootstrap\Widget\Form\Controls\FileBox;
use PHPBootstrap\Widget\Form\Controls\XFileBox;
use PHPBootstrap\Widget\Form\Controls\XComboBox;

/**
 * Renderizador de um conjunto de valida��o
 */
class RendererDecoratorValidate extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Validate $ui, HtmlNode $node ) {
		$validate = array();
		$messages = array();
		foreach ( $ui->getIterator() as $rule ) {
			if ( $rule instanceof Requirable && $rule->getContext() ) {
				$validate[$rule->getIdentify()] = $this->renderContext($rule->getContext());
			} else {
				$validate[$rule->getIdentify()] = $rule->getContext() === null ? true : $rule->getContext();
			}
			if ( $rule->getMessage() ) {
				$messages[$rule->getIdentify()] = utf8_encode($rule->getMessage());
			}
		}
		if ( ! empty($validate) ) {
			$validate['messages'] = $messages;
			$node->setAttribute('data-validate', str_replace('"', "&quot;", json_encode($validate)));
		}
	}
	
	
	/**
	 * @param InputContext $context
	 * @return string
	 */
	protected function renderContext(InputContext $context) {
		$selectors = [];
		$input = $context->getContextInput();
		$params = $context->getContextParam();
		$params = is_array($params) ? $params : [$params];
		foreach( $params as $param ) {
			$selector = '#' . $input->getName();
			if ( $input instanceof XComboBox ) {
				$selector.= ' :hidden';
			} elseif ($input instanceof XFileBox) {
				$selector.= ' :file';
			} elseif ( $input instanceof AbstractInputChecked ) {
				$selector.=':checked';
			} elseif( $input instanceof AbstractInputListChecked ) {
				$selector.=' :checked';
			} elseif ($input instanceof AbstractInputList) {
				$selector.=' option:selected';
			} elseif ( $param === null ) {		
				$selector.= '[value!=""]';
			}
			if ( $param !== null ) {
				$selector.= '[value="' . $param . '"]';
			}
			$selectors[] = $selector;
		}
		return implode(', ', $selectors);
	}

}
?>