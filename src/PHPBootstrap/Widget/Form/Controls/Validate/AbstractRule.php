<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Validate as Rule;

/**
 * Interface de um decorador de validaчуo
 */
abstract class AbstractRule {

	/**
	 * Regra
	 *
	 * @var Rule
	 */
	protected $rule;

	/**
	 * Mensagem de erro
	 *
	 * @var string
	 */
	protected $message;

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
	 * Obtem os paramentos
	 *
	 * @return mixed
	 * @throws \RuntimeException
	 */
	abstract public function getParameter();

	/**
	 * Obtem a mensagem de erro
	 *
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
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