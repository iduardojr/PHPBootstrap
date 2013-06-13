<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\Validate;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;
use PHPBootstrap\Validate\Requirable;

/**
 * Renderizador de um conjunto de validaчуo
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
				$validate[$rule->getIdentify()] = $rule->getContext()->getContextIdentify();
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

}
?>