<?php
namespace PHPBootstrap\Widget\Layout;

use PHPBootstrap\Widget\AbstractContainer;

/**
 * Linha
 */
class Row extends AbstractContainer {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.layout.row';
	
	/**
	 * Fluido
	 *
	 * @var boolean
	 */
	protected $fluid;
	
	/**
	 * Construtor
	 * 
	 * @param boolean $fluid
	 */
	public function __construct( $fluid = false ) {
		parent::__construct();
		$this->setFluid($fluid);
	}
	
	/**
	 * Atribui fluido
	 * 
	 * @param boolean $fluid
	 */
	public function setFluid( $fluid ) {
		$this->fluid = (bool) $fluid;
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