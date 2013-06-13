<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\AbstractComponent;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputInline;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputContext;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\Controls\Decorator\Validate;
use PHPBootstrap\Validate\Requirable;
use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Measure\Ruler\RulerNumber;
use PHPBootstrap\Validate\Pattern\Number;

/**
 * Campo de entrada de numero
 */
class NumberBox extends AbstractComponent implements TextEditable, InputInline, InputQuery, InputContext {

	/**
	 * Campo
	 *
	 * @var TextBox
	 */
	protected $input;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Number $pattern
	 */
	public function __construct( $name, Number $pattern ) {
		$this->input = new TextBox($name);
		$this->setPattern($pattern);
	}

	/**
	 *
	 * @see Inputable::prepare()
	 */
	public function prepare( Form $form ) {
		$this->input->prepare($form);
	}

	/**
	 * Atribui um valor
	 *
	 * @param number $value
	 */
	public function setValue( $value ) {
		$this->input->setValue($value);
	}

	/**
	 * Obtem o valor
	 *
	 * @return number
	 */
	public function getValue() {
		return $this->input->getValue();
	}

	/**
	 *
	 * @see TextEditable::setText()
	 */
	public function setText( $text ) {
		$this->input->setText($text);
	}

	/**
	 *
	 * @see TextEditable::getText()
	 */
	public function getText() {
		return $this->input->getText();
	}

	/**
	 *
	 * @see Inputable::valid()
	 */
	public function valid() {
		return $this->input->valid();
	}

	/**
	 *
	 * @see Inputable::getFailMessages()
	 */
	public function getFailMessages() {
		return $this->input->getFailMessages();
	}

	/**
	 *
	 * @see Component::getComponent()
	 */
	public function getComponent() {
		return $this->input;
	}

	/**
	 * Obtem Auto complete
	 *
	 * @return boolean
	 */
	public function getAutoComplete() {
		return $this->input->getAutoComplete();
	}

	/**
	 * Atribui auto complete
	 *
	 * @param boolean $autoComplete
	 */
	public function setAutoComplete( $autoComplete ) {
		$this->input->setAutoComplete($autoComplete);
	}

	/**
	 * Obtem campo desabilitado
	 *
	 * @return boolean
	 */
	public function getDisabled() {
		return $this->input->getDisabled();
	}

	/**
	 * Atribui campo desabilitado
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled( $disabled ) {
		$this->input->setDisabled($disabled);
	}

	/**
	 * Atribui o tamanho do input com valores entre 1 e 12
	 *
	 * @param integer $span
	 * @throws \InvalidArgumentException
	 */
	public function setSpan( $span ) {
		$this->input->setSpan($span);
	}

	/**
	 * Obtem o tamanho do input
	 *
	 * @return integer
	 */
	public function getSpan() {
		return $this->input->getSpan();
	}

	/**
	 * Obtem texto reservado
	 *
	 * @return string
	 */
	public function getPlaceholder() {
		return $this->input->getPlaceholder();
	}

	/**
	 * Atribui texto reservado
	 *
	 * @param string $placeholder
	 */
	public function setPlaceholder( $placeholder ) {
		$this->input->setPlaceholder($placeholder);
	}

	/**
	 * Adiciona um filtro de entrada de texto
	 *
	 * @param callback $filter
	 * @throws \InvalidArgumentException
	 */
	public function addFilter( $filter ) {
		$this->input->addFilter($filter);
	}

	/**
	 * Remove um filtro de entrada de texto
	 *
	 * @param callback $filter
	 */
	public function removeFilter( $filter ) {
		$this->input->removeFilter($filter);
	}

	/**
	 * Obtem arredondamento
	 *
	 * @return boolean
	 */
	public function getRounded() {
		return $this->input->getRounded();
	}

	/**
	 * Atribui arredondamento
	 *
	 * @param boolean $rounded
	 */
	public function setRounded( $rounded ) {
		$this->input->setRounded($rounded);
	}

	/**
	 * Obtem campo requerido
	 *
	 * @return Requirable
	 */
	public function getRequired() {
		return $this->input->getRequired();
	}

	/**
	 * Atribui campo requerido
	 *
	 * @param Requirable $nule
	 */
	public function setRequired( Requirable $rule = null ) {
		$this->input->setRequired($rule);
	}

	/**
	 * Atribui um padrão
	 *
	 * @param Number $rule
	 */
	public function setPattern( Number $rule ) {
		$this->input->setPattern($rule);
		$this->input->setFormatter($rule->getFormat());
		$this->input->setMask(new MaskMoney($rule->getFormat()));
	}

	/**
	 * Obtem o padrão
	 *
	 * @return Number
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Measurable
	 */
	public function getLength() {
		return $this->input->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		$rule->setCounter(new RulerNumber($this->input->getFormatter()));
		$this->input->setLength($rule);
	}

	/**
	 * Obtem as regras de validação
	 *
	 * @return Validate
	 */
	public function getValidate() {
		return $this->input->getValidate();
	}

	/**
	 *
	 * @see InputContext::getContextIdentify()
	 */
	public function getContextIdentify() {
		return $this->input->getContextIdentify();
	}

	/**
	 *
	 * @see Context::getContextValue()
	 */
	public function getContextValue() {
		return $this->input->getContextValue();
	}

}
?>