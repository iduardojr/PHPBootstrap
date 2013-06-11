<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Validate\InputContext;

/**
 * Contexto do valor de um input list
 */
class ValueInList implements InputContext {

	/**
	 * Campo
	 *
	 * @var AbstractInputList
	 */
	protected $input;

	/**
	 * Valor do campo
	 *
	 * @var scalar
	 */
	protected $value;

	/**
	 * Construtor
	 * 
	 * @param AbstractInputList $input
	 * @param scalar $value
	 * @throws \InvalidArgumentException
	 */
	public function __construct( AbstractInputList $input, $value ) {
		if ( ! is_scalar($value) || empty($value) ) {
			throw new \InvalidArgumentException('value not is type scalar or not empty');
		}
		$this->input = $input;
		$this->value = $value;
	}

	/**
	 *
	 * @see InputContext::getContextIdentify()
	 */
	public function getContextIdentify() {
		return $this->input->getContextIdentify($this->value);
	}

	/**
	 *
	 * @see Context::getContextValue()
	 */
	public function getContextValue() {
		$context = $this->input->getContextValue();
		if ( ! is_array($context) ) {
			$context = array($context);
		}
		return in_array($this->value, $context) ? $this->value : null;
	}

}
?>