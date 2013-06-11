<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Icone
 */
class Icon extends AbstractWidget {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.icon';

	/**
	 * Icone
	 * 
	 * @var string
	 */
	protected $icon;

	/**
	 * Branco
	 *
	 * @var boolean
	 */
	protected $white;

	/**
	 * Construtor
	 * 
	 * @param string $icon
	 * @param boolean $white
	 */
	function __construct( $icon, $white = false ) {
		$this->setIcon($icon);	
		$this->setWhite($white);
	}

	/**
	 * Obtem icone
	 * 
	 * @return string
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Atribui icone
	 * 
	 * @param string $icon
	 */
	public function setIcon( $icon ) {
		$this->icon = $icon;
	}

	/**
	 * Obtem se icone é branco
	 * 
	 * @return boolean
	 */
	public function getWhite() {
		return $this->white;
	}

	/**
	 * Atribui icone branco
	 * 
	 * @param boolean $white
	 */
	public function setWhite( $white ) {
		$this->white = ( bool ) $white;
	}

}
?>