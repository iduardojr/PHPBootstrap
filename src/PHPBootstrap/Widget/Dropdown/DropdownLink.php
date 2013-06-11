<?php
namespace PHPBootstrap\Widget\Dropdown;

use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Containable;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Link do Drowpdown
 */
class DropdownLink extends AbstractRender implements DropdownElement, Containable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.dropdown.link';

	/**
	 * Rotulo
	 *
	 * @var string
	 */
	protected $label;

	/**
	 * Icone
	 *
	 * @var Icon
	 */
	protected $icon;

	/**
	 * Desabilitado
	 *
	 * @var boolean
	 */
	protected $disabled;

	/**
	 * Alternador
	 *
	 * @var ToggleDeep
	 */
	protected $toggle;

	/**
	 * Dica
	 *
	 * @var Tooltip
	 */
	protected $tooltip;

	/**
	 * Pai
	 *
	 * @var Dropdown
	 */
	protected $parent;

	/**
	 * Construtor
	 *
	 * @param string $label
	 * @param Pluggable $toggle
	 */
	public function __construct( $label, Pluggable $toggle = null ) {
		$this->setLabel($label);
		if ( $toggle ) {
			$this->setToggle($toggle);
		}
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

	/**
	 * Obtem icone
	 *
	 * @return Icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Atribui icone
	 *
	 * @param Icon $icon
	 */
	public function setIcon( Icon $icon = null ) {
		if ( $icon !== null ) {
			$icon->setParent($this);
		}
		$this->icon = $icon;
	}

	/**
	 *
	 * @see DropdownElement::getParent()
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 *
	 * @see DropdownElement::setParent()
	 */
	public function setParent( Dropdown $parent = null ) {
		$this->parent = $parent;
	}

}
?>