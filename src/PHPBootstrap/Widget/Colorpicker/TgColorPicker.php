<?php
namespace PHPBootstrap\Widget\Colorpicker;

use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;

/**
 * Alternador de seletor de cor
 */
class TgColorPicker extends AbstractColorPicker implements Pluggable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.colorpicker.toggle';

	/**
	 * Alvo
	 *
	 * @var InputPicker
	 */
	protected $target;
	
	/**
	 * Valor padrao
	 *
	 * @var string
	 */
	protected $defaultValue;

	/**
	 * Construtor
	 * - ColorFormat.HEX
	 * - ColorFormat.RGB
	 * - ColorFormat.RGBA
	 * - ColorFormat.HLS
	 * - ColorFormat.HLSA
	 * 
	 * @param string $format
	 * @param InputPicker $target
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $format = null, InputPicker $target = null ) {
		parent::__construct($format);
		$this->setTarget($target);
	}

	/**
	 * Obtem alvo
	 *
	 * @return InputPicker
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param InputPicker $target
	 */
	public function setTarget( InputPicker $target = null ) {
		$this->target = $target;
	}
	
	/**
	 * Obtem o valor padrão
	 * 
	 * @return string
	 */
	public function getDefaultValue() {
		return $this->defaultValue;
	}

	/**
	 * Atribui um valor padrão
	 * 
	 * @param string $defaultValue
	 */
	public function setDefaultValue( $defaultValue ) {
		$this->defaultValue = $defaultValue;
	}

	/**
	 *
	 * @see ToggleDeep::setParameters()
	 */
	public function setParameters( array $paramaters ) {
		
	}

}
?>