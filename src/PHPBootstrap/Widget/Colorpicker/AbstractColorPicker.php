<?php
namespace PHPBootstrap\Widget\Colorpicker;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Format\ColorFormat;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Seletor de cor abstrato
 */
class AbstractColorPicker extends AbstractRender {

	/**
	 * Formato
	 *
	 * @var string
	 */
	protected $format;

	/**
	 * Construtor
	 * - ColorFormat.HEX
	 * - ColorFormat.RGB
	 * - ColorFormat.RGBA
	 * - ColorFormat.HLS
	 * - ColorFormat.HLSA
	 * 
	 * @param string $format
	 */
	public function __construct( $format = null ) {
		$this->setFormat($format);
	}

	/**
	 * Obtem formato
	 *
	 * @return string
	 */
	public function getFormat() {
		return $this->format;
	}

	/**
	 * Atribui formato:
	 * - ColorFormat.HEX
	 * - ColorFormat.RGB
	 * - ColorFormat.RGBA
	 * - ColorFormat.HLS
	 * - ColorFormat.HLSA
	 * 
	 * @param string $format
	 * @throws \UnexpectedValueException
	 */
	public function setFormat( $format ) {
		$this->format = Enum::ensure($format, 'PHPBootstrap\Format\ColorFormat', ColorFormat::HEX);
	}

}
?>