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
	 * @param Widget|array $contents
	 */
	public function __construct( $name, $fluid = false, $contents = null ) {
		parent::__construct();
		$this->setName($name);
		$this->setFluid($fluid);
		if ( $contents !== null ) {
			if ( !is_array($contents) ){
				$contents = array($contents);
			}
			foreach( $contents as $content ) {
				$this->append($content);
			}
		}
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