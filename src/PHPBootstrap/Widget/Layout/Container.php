<?php
namespace PHPBootstrap\Widget\Layout;

use PHPBootstrap\Widget\AbstractContainer;

/**
 * Container
 */
class Container extends AbstractContainer {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.layout.container';

	/**
	 * Fluido
	 *
	 * @var boolean
	 */
	protected $fluid;

	/**
	 * Construtor
	 * 
	 * @param string $name
	 * @param boolean $fluid
	 */
	public function __construct( $name, $fluid = false ) {
		parent::__construct();
		$this->setName($name);
		$this->setFluid($fluid);
	}

	/**
	 * Atribui fluido
	 *
	 * @param boolean $fluid
	 */
	public function setFluid( $fluid ) {
		$this->fluid = ( bool ) $fluid;
	}

	/**
	 * Obtem fluido
	 *
	 * @return boolean
	 */
	public function getFluid() {
		return $this->fluid;
	}

}
?>