<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Misc\Icon;

/**
 * Link de navegaчуo
 */
class NavLink extends AbstractElement implements NavElement {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.link';

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
	 * @var Pluggable
	 */
	protected $toggle;
	
	/**
	 * Dica
	 *
	 * @var Tooltip
	 */
	protected $tooltip;
	
	/**
	 * Construtor
	 *
	 * @param string|Icon $label
	 * @param Pluggable $toggle
	 */
	public function __construct( $label, Pluggable $toggle = null ) {
		if ( $label instanceof Icon ) {
			$this->setIcon($label);
		} else {
			$this->setLabel($label);
		}
		$this->setToggle($toggle);
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
		$this->icon = $icon;
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
	public function setTooltip( Tooltip $tooltip  = null ) {
		$this->tooltip = $tooltip;
	}

}
?>