<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Format\ColorFormat;

/**
 * Cor
 */
class Color extends Pattern {
	
	/**
	 * Construtor
	 * 
	 * @param ColorFormat $format
	 * @param string $message
	 */
	public function __construct( $format, $message = null ) {
		$this->context = $format;
		$this->setMessage($message);
	}
	
	/**
	 * @see AbstractValidate::getContext()
	 */
	public function getContext() {
		switch ( $this->context ) {
			case ColorFormat::HEX:
				return '#([a-fA-F0-9]{3}){1,2}';
				break;
					
			case ColorFormat::HLS:
				return 'hsl\(\s*(\d+(\.\d+)?)\s*,\s*(\d+(\.\d+)?)\%\s*,\s*(\d+(\.\d+)?)\%\s*\)';
				break;
		
			case ColorFormat::HLSA:
				return 'hsla\(\s*(\d+(\.\d+)?)\s*,\s*(\d+(\.\d+)?)\%\s*,\s*(\d+(\.\d+)?)\%\s*(,\s*(\d+(\.\d+)?)\s*)\)';
				break;
		
			case ColorFormat::RGB:
				return 'rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)';
				break;
		
			case ColorFormat::RGBA:
				return 'rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d+(\.\d+)?\s*)\)';
				break;
		}
	}
	
	/**
	 * Obtem formato
	 * 
	 * @return ColorFormat
	 */
	public function getFormat() {
		return $this->context;
	}
}
?>