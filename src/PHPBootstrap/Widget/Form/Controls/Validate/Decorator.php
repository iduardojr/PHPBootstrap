<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Validate as Rule;

/**
 * Decorador de validaчуo
 */
class Decorator {

	/**
	 * Regra
	 *
	 * @var Rule
	 */
	protected $rule;
	
	/**
	 * Construtor
	 * 
	 * @param Rule $rule
	 */
	public function __construct( Rule $rule ) {
		$parameter = $this->get
		if ( isset($context) && ! $context instanceof InputContext ) {
			throw new \InvalidArgumentException('context in rule not is instance of PHPBootstrap\Widget\Form\Controls\Validate\InputContext');
		}
		$this->rule = $rule;
	}

	/**
	 * Obtem a identificaчуo da regra de validaчуo
	 *
	 * @return string
	 */
	public function getIdentify() {
		return $this->rule->getIdentify();
	}

	/**
	 * Obtem a regra
	 * 
	 * @return Rule
	 */
	public function getRule() {
		return $this->rule;
	}

	/**
	 * Obtem o parametro
	 *
	 * @return mixed
	 */
	public function getParameter() {
		return $this->rule->getContext();
	}

	/**
	 * Obtem a mensagem de erro
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->rule->getMessage();
	}

	/**
	 * Valida o valor
	 *
	 * @param mixed $value
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function valid( $value ) {
		return $this->rule->valid($value);
	}

}
?>