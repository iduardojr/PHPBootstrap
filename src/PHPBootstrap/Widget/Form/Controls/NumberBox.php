<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Format\NumberFormat;
use PHPBootstrap\Validate\Required\ContextEqualTo;
use PHPBootstrap\Validate\Required\Requirable;
use PHPBootstrap\Validate\Pattern\Pattern;
use PHPBootstrap\Validate\Pattern\Regex;
use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Length\Counter\NumberLen;
use PHPBootstrap\Widget\AbstractComponent;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputInline;
use PHPBootstrap\Widget\Form\Controls\Validate\InputContext;
use PHPBootstrap\Widget\Form\Form;

/**
 * Campo de entrada de numero
 */
class NumberBox extends AbstractComponent implements TextEditable, InputInline, InputQuery, InputContext, ContextEqualTo {

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
	 * @param NumberFormat $pattern
	 * @param string $message
	 */
	public function __construct( $name, NumberFormat $pattern, $message ) {
		$this->input = new TextBox($name);
		$this->setPattern($pattern, $message);
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
	 * @param string $message
	 */
	public function setRequired( Requirable $rule = null, $message = null ) {
		$this->input->setRequired($rule, $message);
	}

	/**
	 * Atribui um padrão
	 *
	 * @param NumberFormat $pattern
	 * @param string $message
	 */
	public function setPattern( NumberFormat $pattern, $message ) {
		$this->input->setMask(new MaskMoney($pattern));
		$this->input->setPattern(new Regex($pattern->regex()), $message);
		$this->input->setFormatter($pattern);
	}

	/**
	 * Obtem o padrão
	 *
	 * @return Pattern
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Length
	 */
	public function getLength() {
		return $this->input->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Length $rule
	 * @param string $message
	 */
	public function setLength( Length $rule = null, $message = null ) {
		$rule->setCounter(new NumberLen($this->input->getFormatter()));
		$this->input->setLength($rule, $message);
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