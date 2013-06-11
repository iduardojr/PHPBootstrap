<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Ancora
 */
class Anchor extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.anchor';

	/**
	 * Alternador
	 *
	 * @var ToggleDeep
	 */
	protected $toggle;

	/**
	 * Rotulo
	 *
	 * @var string
	 */
	protected $label;

	/**
	 * Desabilitado
	 *
	 * @var boolean
	 */
	protected $disabled;

	/**
	 * dica
	 *
	 * @var Tooltip
	 */
	protected $tooltip;

	/**
	 * Construtor
	 *
	 * @param string $label
	 * @param Pluggable $toggle
	 */
	public function __construct( $label, Pluggable $toggle = null ) {
		$this->setLabel($label);
		$this->setToggle($toggle);
	}

	/**
	 * Obtem desabilitado
	 *
	 * @return boolean
	 */
	public function getDisabled() {
		return $this->disabled;
	}

	/**
	 * Atribui desabilitado
	 *
	 * @param boolean $disabled
	 */
	public function setDisabled( $disabled ) {
		$this->disabled = ( bool ) $disabled;
	}

	/**
	 * Atribui Alternador
	 *
	 * @param Pluggable $toggle
	 */
	public function setToggle( Pluggable $toggle = null ) {
		$this->toggle = $toggle;
	}

	/**
	 * Obtem Alternador
	 *
	 * @return Pluggable
	 */
	public function getToggle() {
		return $this->toggle;
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
	 * Obtem dica
	 *
	 * @return Tooltip
	 */
	public function getTooltip() {
		return $this->tooltip;
	}

	/**
	 * Atribui dica
	 *
	 * @param Tooltip $tooltip
	 */
	public function setTooltip( Tooltip $tooltip = null ) {
		$this->tooltip = $tooltip;
	}

}
?>