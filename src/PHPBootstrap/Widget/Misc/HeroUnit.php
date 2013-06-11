<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Widget\AbstractContainer;

/**
 * Unidade Heroi
 */
class HeroUnit extends AbstractContainer {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.herounit';

	/**
	 * Construtor
	 * 
	 * @param string $name
	 */
	public function __construct( $name ) {
		parent::__construct();
		$this->setName($name);
	}

}
?>