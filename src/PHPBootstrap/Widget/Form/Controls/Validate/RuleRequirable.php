<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Required\Requirable;

/**
 * Decorador de regras requeriveis
 */
class RuleRequirable extends AbstractRule {

	/**
	 * Construtor
	 * 
	 * @param Requirable $rule
	 * @param string $message
	 * @throws \InvalidArgumentException
	 */
	public function __construct( Requirable $rule, $message ) {
		$context = $rule->getContext();
		if ( isset($context) && ! $context instanceof InputContext ) {
			throw new \InvalidArgumentException('context in rule not is instance of PHPBootstrap\Widget\Form\Controls\Validate\InputContext');
		}
		$this->rule = $rule;
		$this->message = $message;
	}

	/**
	 *
	 * @see Rule::getParameter()
	 */
	public function getParameter() {
		$context = $this->rule->getContext();
		if ( isset($context) ) {
			if ( ! $context instanceof InputContext ) {
				throw new \RuntimeException('context in rule not is instance of PHPBootstrap\Widget\Form\Controls\Validate\InputContext');
			}
			return $context->getContextIdentify();
		}
		return null;
	}

}
?>