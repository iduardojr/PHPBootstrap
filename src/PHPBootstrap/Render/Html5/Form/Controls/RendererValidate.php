<?php
namespace PHPBootstrap\Render\Html5\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Validate\Validate;
use PHPBootstrap\Render\Html5\RendererDependsResponse;
use PHPBootstrap\Render\Html5\HtmlNode;

/**
 * Renderizador de um conjunto de validaчуo
 */
class RendererValidate extends RendererDependsResponse {

	/**
	 *
	 * @see RendererDependsResponse::_render()
	 */
	protected function _render( Validate $ui, HtmlNode $node ) {
		$validate = array();
		$messages = array();
		foreach ( $ui->getIterator() as $rule ) {
			$validate[$rule->getIdentify()] = $rule->getParameter() ? $rule->getParameter() : true;
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