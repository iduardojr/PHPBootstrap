<?php
namespace PHPBootstrap\Widget\Datepicker;

use PHPBootstrap\Format\DateFormat;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;

/**
 * Alternador de seletor de data
 */
class TgDatePicker extends AbstractDatePicker implements Pluggable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.datepicker.toggle';

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
	 *
	 * @param DateFormat $format
	 * @param InputPicker $target
	 * @throws \InvalidArgumentException
	 */
	public function __construct( DateFormat $format, InputPicker $target = null ) {
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
	 * @param mixed $defaultValue
	 * @throws \InvalidArgumentException
	 */
	public function setDefaultValue( $defaultValue ) {
		if ( preg_match($this->format->regex(), $defaultValue) <= 0 ) {
			$defaultValue = $this->format->format($defaultValue);
		}
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