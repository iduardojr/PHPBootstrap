<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Button\Button;

/**
 * Combobox especial
 */
class XComboBox extends AbstractInputList {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.xcombobox';
	
	/**
	 * Estilo do botão
	 * 
	 * @var string
	 */
	protected $buttonStyle;

	/**
	 * Texto reservado
	 *
	 * @var string
	 */
	protected $placeholder;
	
	/**
	 * Obtem texto reservado
	 *
	 * @return string
	 */
	public function getPlaceholder() {
		return $this->placeholder;
	}
	
	/**
	 * Atribui texto reservado
	 *
	 * @param string $placeholder
	 */
	public function setPlaceholder( $placeholder ) {
		$this->placeholder = $placeholder;
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
	 * Atribui estilo do botão
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
	 *
	 * @see AbstractInputList::getContextIdentify()
	 */
	public function getContextIdentify( $value = null ) {
		if ( ! empty($value) && $this->options->containsKey($value) ) {
			return parent::getContextIdentify() . ' :hidden[value="' . $value . '"]';
		}
		return parent::getContextIdentify() . ' :hidden';
	}

}
?>