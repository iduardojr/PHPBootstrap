<?php
namespace PHPBootstrap\Widget\Progress;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Barra
 */
class Bar extends AbstractRender {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.progress.bar';

	// Estilos
	const Info 	  = 'bar-info';
	const Success = 'bar-success';
	const Warning = 'bar-warning';
	const Danger  = 'bar-danger';
	
	/**
	 * Valor
	 *
	 * @var number
	 */
	protected $value;

	/**
	 * Estilo
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Rotulo
	 *
	 * @var string
	 */
	protected $label;
	
	/**
	 * Pai
	 *
	 * @var ProgressBar
	 */
	protected $parent;

	/**
	 * Construtor
	 *
	 * @param number $value
	 * @param string $type
	 * @param string $label
	 */
	public function __construct( $value, $type = null, $label = null ) {
		$this->setValue($value);
		$this->setLabel($label);
		$this->setStyle($type);
	}

	/**
	 * Obtem rotulo
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * Atribui rotulo
	 *
	 * @param string $label
	 */
	public function setLabel( $label ) {
		$this->label = $label;
	}

	/**
	 * Obtem valor
	 *
	 * @return number
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Atribui valor
	 *
	 * @param number $value
	 */
	public function setValue( $value ) {
		if ( $value < 0 ) {
			$value = 0;
		} else if ( $value > 100 ) {
			$value = 100;
		}
		$this->value = ( float ) $value;
	}

	/**
	 * Atribui estilo:
	 * - Bar.Info
	 * - Bar.Success
	 * - Bar.Warning
	 * - Bar.Danger
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$this->style = Enum::ensure($style, $this, null);
	}

	/**
	 * Obtem estilo
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}
	
	/**
	 * Obtem pai
	 *
	 * @return ProgressBar
	 */
	public function getParent() {
		return $this->parent;
	}
	
	/**
	 * Atribui pai
	 *
	 * @param ProgressBar $parent
	 */
	public function setParent( ProgressBar $parent = null ) {
		$this->parent = $parent;
	}

}
?>