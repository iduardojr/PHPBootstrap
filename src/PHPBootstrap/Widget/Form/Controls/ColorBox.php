<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Colorpicker\TgColorPicker;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Validate\Pattern\Color;
use PHPBootstrap\Format\ColorFormat;

/**
 * Campo de entrada de cor
 */
class ColorBox extends AbstractTextBoxComponent {

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Color $pattern
	 */
	public function __construct( $name, Color $pattern ) {
		$this->toggle = new TgColorPicker($pattern->getFormat());
		$this->icon = new Icon('icon-color');
		parent::__construct($name);
		$this->toggle->setTarget($this->input);
		$this->setPattern($pattern);
	}
	
	/**
	 * Obtem o formato
	 *
	 * @return ColorFormat
	 */
	public function getFormat() {
		return $this->toggle->getFormat();
	}
	
	/**
	 * Obtem o padrão
	 *
	 * @return Color
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}

	/**
	 * Atribui padrão
	 * 
	 * @param Color $rule
	 * @param string $message
	 */
	public function setPattern( Color $rule ) {
		$this->input->setPattern($rule);
		$this->toggle->setFormat($rule->getFormat());
		$this->input->setMask($rule->getFormat() == ColorFormat::HEX ? '#hhh?hhh' : null);
		
	}

}
?>