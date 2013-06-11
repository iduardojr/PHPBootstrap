<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Pattern\Pattern;

/**
 * Decorador de regras de padrão
 */
class RulePattern extends AbstractRule {

	/**
	 * Construtor
	 *
	 * @param Pattern $rule
	 * @param string $message
	 */
	public function __construct( Pattern $rule, $message ) {
		$this->rule = $rule;
		$this->message = $message;
	}

	/**
	 *
	 * @see AbstractRule::getParameter()
	 */
	public function getParameter() {
		return $this->rule->getPattern();
	}

}

?>