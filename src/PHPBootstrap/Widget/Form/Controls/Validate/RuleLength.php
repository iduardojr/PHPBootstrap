<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Length\Length;

/**
 * Decorador de regras de tamanho
 */
class RuleLength extends AbstractRule {

	/**
	 * Construtor
	 * 
	 * @param Length $rule
	 * @param string $message
	 */
	public function __construct( Length $rule, $message ) {
		$this->rule = $rule;
		$this->message = $message;
	}

	/**
	 *
	 * @see AbstractRule::getParameter()
	 */
	public function getParameter() {
		return $this->rule->getValue();
	}
	
}
?>