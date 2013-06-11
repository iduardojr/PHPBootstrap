<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Format\ColorFormat;
use PHPBootstrap\Validate\Pattern\Regex;
use PHPBootstrap\Widget\Colorpicker\TgColorPicker;
use PHPBootstrap\Widget\Misc\Icon;

/**
 * Campo de entrada de cor
 */
class ColorBox extends AbstractTextBoxComponent {

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param ColorFormat $format
	 * @param string $message
	 */
	public function __construct( $name, $format, $message ) {
		$this->toggle = new TgColorPicker($format);
		$this->icon = new Icon('icon-color');
		parent::__construct($name);
		$this->toggle->setTarget($this->input);
		$this->setPattern($format, $message);
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
	 * @return Pattern
	 */
	public function getPattern() {
		return $this->input->getPattern();
	}

	/**
	 * Atribui padrão
	 * 
	 * @param ColorFormat $format
	 * @param string $message
	 */
	public function setPattern( $format, $message ) {
		$this->toggle->setFormat($format);
		$this->input->setMask(null);
		$pattern = '/^';
		switch ($format) {
			case ColorFormat::HEX:
				$this->input->setMask('#hhh?hhh');
				$pattern.= '#([a-fA-F0-9]{3}){1,2}';
				break;
			
			case ColorFormat::HLS:
				$pattern.= 'hsl\(\s*(\d+(\.\d+)?)\s*,\s*(\d+(\.\d+)?)\%\s*,\s*(\d+(\.\d+)?)\%\s*\)';
				break;
				
			case ColorFormat::HLSA:
				$pattern.= 'hsla\(\s*(\d+(\.\d+)?)\s*,\s*(\d+(\.\d+)?)\%\s*,\s*(\d+(\.\d+)?)\%\s*(,\s*(\d+(\.\d+)?)\s*)\)';
				break;
				
			case ColorFormat::RGB:
				$pattern.= 'rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)';
				break;
				
			case ColorFormat::RGBA:
				$pattern.= 'rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d+(\.\d+)?\s*)\)';
				break;
		}
		
		$pattern .= '$/';
		$this->input->setPattern(new Regex($pattern), $message);
	}

}
?>