<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Validate\Required\Requirable;
use PHPBootstrap\Validate\Required\ContextEqualTo;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\AbstractComponent;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Widget\Form\Controls\Validate\Validate;
use PHPBootstrap\Widget\Form\Controls\Validate\InputContext;
use PHPBootstrap\Widget\Form\Controls\Decorator\Embed;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Form;

/**
 * Campo abstrato de entrada de dados
 */
abstract class AbstractTextBoxComponent extends AbstractComponent implements TextEditable, InputQuery, InputContext, ContextEqualTo {

	/**
	 * Campo
	 *
	 * @var TextBox
	 */
	protected $input;

	/**
	 * Componente
	 *
	 * @var Embed
	 */
	protected $component;

	/**
	 * Botуo
	 *
	 * @var Button
	 */
	protected $button;

	/**
	 * Icone
	 *
	 * @var Icon
	 */
	protected $icon;

	/**
	 * Alternador
	 *
	 * @var Toggle
	 */
	protected $toggle;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->input = new TextBox($name);
		$this->button = new Button($this->icon, $this->toggle);
		$this->component = new Embed($this->input);
		$this->component->append($this->button);
	}
	
	/**
	 *
	 * @see Inputable::prepare()
	 */
	public function prepare( Form $form ) {
		$this->input->prepare($form);
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
	 * @see Inputable::getValue()
	 */
	public function getValue() {
		return $this->input->getValue();
	}
	
	/**
	 *
	 * @see Inputable::setValue()
	 */
	public function setValue( $value ) {
		$this->input->setValue($value);
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
	 * Obtem campo desabilitaedo
	 *
	 * @return boolean
	 */
	public function getDisabled() {
		return $this->button->getDisabled();
	}
	
	/**
	 * Atribui campo desabilitado
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled( $disabled ) {
		$this->input->setDisabled($disabled);
		$this->button->setDisabled($disabled);
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
	 * @param Requirable $rule
	 * @param string $message
	 */
	public function setRequired( Requirable $rule = null, $message = null ) {
		$this->input->setRequired($rule, $message);
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
	 * Obtem as regras de validaчуo
	 *
	 * @return Validate
	 */
	public function getValidate() {
		return $this->input->getValidate();
	}

	/**
	 *
	 * @see Component::getComponent()
	 */
	public function getComponent() {
		return $this->component;
	}

	/**
	 * Atribui estilo do botуo
	 * - Button.Primary
	 * - Button.Success
	 * - Button.Info
	 * - Button.Warning
	 * - Button.Danger
	 * - Button.Inverse
	 * - Button.Link
	 * 
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setButtonStyle( $style ) {
		$this->button->setStyle($style);
		$this->icon->setWhite( ! in_array($style, array(Button::Link, null)));
	}

	/**
	 * Obtem estilo do botуo
	 * 
	 * @return string
	 */
	public function getButtonStyle() {
		return $this->button->getStyle();
	}
	
	/**
	 * Define o botуo a esquerda
	 */
	public function setButtonToLeft() {
		$this->component->remove($this->button);
		$this->component->prepend($this->button);
	}
	
	/**
	 * Define o botуo a direita
	 */
	public function setButtonToRight() {
		$this->component->remove($this->button);
		$this->component->append($this->button);
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