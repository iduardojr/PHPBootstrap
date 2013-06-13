<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Required\Requirable;

/**
 * Decorador requerivel
 */
class DecoratorRequired extends Decorator {

	/**
	 * Construtor
	 * 
	 * @param Requirable $rule
	 * @param string $message
	 * @throws \InvalidArgumentException
	 */
	public function __construct( Requirable $rule ) {
		$context = $rule->getParameter();
		
		$this->rule = $rule;
	}

	/**
	 * @see Decorator::getParameter()
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