<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Validate\Pattern\Upload;
use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Length\Counter\UploadLen;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Button\Button;

/**
 * Campo de upload de arquivo especial
 */
class XFileBox extends AbstractInputBox {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.xfilebox';

	/**
	 * Estilo do botao
	 * 
	 * @var string
	 */
	protected $buttonStyle;

	/**
	 * Rotulo de adicionar
	 *
	 * @var string
	 */
	protected $labelAdd;

	/**
	 * Rotulo de limpar
	 *
	 * @var string
	 */
	protected $labelClear;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param string $labelAdd
	 * @param string $labelClear
	 */
	public function __construct( $name, $labelAdd = 'Procurar', $labelClear = 'Remover' ) {
		parent::__construct($name);
		$this->setLabels($labelAdd, $labelClear);
	}

	/**
	 * Obtem validador do padrуo
	 *
	 * @return Upload
	 */
	public function getPattern() {
		return $this->validator->getPattern();
	}

	/**
	 * Atribui validador do padrao
	 *
	 * @param Upload $rule
	 */
	public function setPattern( Upload $rule = null, $message = null ) {
		$this->validator->setPattern($rule, $message);
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Length
	 */
	public function getLength() {
		return $this->validator->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Length $rule
	 * @param string $message
	 */
	public function setLength( Length $rule = null, $message = null ) {
		if ( $rule !== null ) {
			$rule->setCounter(UploadLen::getInstance());
		}
		$this->validator->setLength($rule, $message);
	}

	/**
	 *
	 * @see AbstractInput::prepare()
	 */
	public function prepare( Form $form ) {
		$this->setValue(null);
		$this->setForm($form);
		$form->setMethod(Form::Post);
		$form->setEncoding(Form::MultiPart);
	}

	/**
	 * Obtem estilo do botao
	 *
	 * @return string
	 */
	public function getButtonStyle() {
		return $this->buttonStyle;
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
		$styles[] = Button::Primary;
		$styles[] = Button::Success;
		$styles[] = Button::Info;
		$styles[] = Button::Warning;
		$styles[] = Button::Danger;
		$styles[] = Button::Inverse;
		$styles[] = Button::Link;
		$this->buttonStyle = Enum::ensure($style, $styles, null);
	}

	/**
	 * Obtem rotulo de adiчуo
	 *
	 * @return string
	 */
	public function getLabelAdd() {
		return $this->labelAdd;
	}

	/**
	 * Atribui rotulo de adiчуo
	 *
	 * @param string $label
	 */
	public function setLabelAdd( $label ) {
		$this->labelAdd = $label;
	}

	/**
	 * Obtem rotulo de limpar
	 *
	 * @return string
	 */
	public function getLabelClear() {
		return $this->labelClear;
	}

	/**
	 * Atribui rotulo de limpar
	 *
	 * @param string $label
	 */
	public function setLabelClear( $label ) {
		$this->labelClear = $label;
	}

	/**
	 * Atribui os rotulos de adiчуo e limpar
	 *
	 * @param string $add
	 * @param string $clear
	 */
	public function setLabels( $add, $clear ) {
		$this->setLabelAdd($add);
		$this->setLabelClear($clear);
	}

	/**
	 *
	 * @see AbstractInput::getContextIdentify()
	 */
	public function getContextIdentify() {
		return parent::getContextIdentify() . ' :file';
	}

	/**
	 *
	 * @see AbstractInput::getContextValue()
	 */
	public function getContextValue() {
		if ( isset($this->value['error']) && $this->value['error'] === UPLOAD_ERR_OK ) {
			return $this->value['name'];
		}
		return null;
	}

}
?>