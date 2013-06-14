<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Validate\Validator;
use PHPBootstrap\Validate\Required\Required;
use PHPBootstrap\Validate\Requirable;
use PHPBootstrap\Widget\Form\Controls\Decorator\Validate;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputContext;
use PHPBootstrap\Widget\Form\Inputable;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Campo de entrada abstrato
 */
abstract class AbstractInput extends AbstractWidget implements Inputable, InputContext {

	/**
	 * Valor do campo
	 *
	 * @var mixed
	 */
	protected $value;

	/**
	 * Auto completar
	 *
	 * @var boolean
	 */
	protected $autoComplete;

	/**
	 * Desabilitado
	 *
	 * @var boolean
	 */
	protected $disabled;

	/**
	 * Validador
	 *
	 * @var Validator
	 */
	protected $validator;

	/**
	 * Validado
	 *
	 * @var boolean
	 */
	protected $valid;

	/**
	 * Formulario
	 *
	 * @var Form
	 */
	protected $form;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->setValidator(null);
		$this->setName($name);
		$this->setForm(null);
		$this->setValue(null);
		$this->setDisabled(false);
		$this->setAutoComplete(false);
		$this->setRequired(null);
	}
	
	/**
	 * Atribui um validador
	 * 
	 * @param Validator $validator
	 */
	public function setValidator( Validator $validator = null ) {
		if ( $validator === null ) {
			$validator = new Validator();
		}
		$this->validator = $validator;
	}

	/**
	 * Obtem o formulario
	 *
	 * @return Form
	 */
	public function getForm() {
		return $this->form;
	}

	/**
	 * Atribui o formulario
	 * 
	 * @param Form $form
	 */
	public function setForm( Form $form = null ) {
		$this->form = $form;
	}

	/**
	 *
	 * @see Inputable::setValue()
	 */
	public function setValue( $value ) {
		if ( ! ( is_scalar($value) || is_null($value) ) ) {
			throw new \InvalidArgumentException('value is not scalar');
		}
		if ( $this->value !== $value ) {
			$this->valid = null;
			$this->value = $value;
		}
	}

	/**
	 *
	 * @see Inputable::getValue()
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 *
	 * @see Inputable::prepare()
	 */
	public function prepare( Form $form ) {
		$this->setForm($form);
	}

	/**
	 * Obtem Auto complete
	 *
	 * @return boolean
	 */
	public function getAutoComplete() {
		return $this->autoComplete;
	}

	/**
	 * Atribui auto complete
	 *
	 * @param boolean $autoComplete
	 */
	public function setAutoComplete( $autoComplete ) {
		$this->autoComplete = ( bool ) $autoComplete;
	}

	/**
	 * Obtem campo desabilitaedo
	 *
	 * @return boolean
	 */
	public function getDisabled() {
		return $this->disabled;
	}

	/**
	 * Atribui campo desabilitado
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled( $disabled ) {
		$this->disabled = ( bool ) $disabled;
	}

	/**
	 * Obtem campo requerido
	 *
	 * @return Requirable
	 */
	public function getRequired() {
		return $this->validator->getRequired();
	}

	/**
	 * Atribui campo requerido
	 *
	 * @param Required $nule
	 * @throws \InvalidArgumentException
	 */
	public function setRequired( Required $rule = null ) {
		if ( $rule instanceof Requirable ) {
			$context = $rule->getContext();
			if ( isset($context) && ! $context instanceof InputContext ) {
				throw new \InvalidArgumentException('context in rule not is instance of PHPBootstrap\Widget\Form\Controls\Decorator\InputContext');
			}
		}
		$this->validator->setRequired($rule);
	}

	/**
	 *
	 * @see Inputable::valid()
	 */
	public function valid() {
		if ( $this->valid === null ) {
			$this->valid = $this->validator->valid($this->value);
		}
		return $this->valid;
	}

	/**
	 *
	 * @see Inputable::getFailMessages()
	 */
	public function getFailMessages() {
		if ( $this->valid === null ) {
			$this->valid();
		}
		return $this->validator->getMessages();
	}

	/**
	 * Obtem as regras de validaчуo
	 *
	 * @return Validate
	 */
	public function getValidate() {
		return new Validate($this->validator->getValidate());
	}

	/**
	 *
	 * @see InputContext::getContextIdentify()
	 */
	public function getContextIdentify() {
		return '#' . $this->getName();
	}

	/**
	 *
	 * @see Context::getContextValue()
	 */
	public function getContextValue() {
		return $this->getValue();
	}

}
?>