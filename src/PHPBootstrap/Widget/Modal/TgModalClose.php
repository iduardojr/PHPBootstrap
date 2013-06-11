<?php
namespace PHPBootstrap\Widget\Modal;

use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Alternador que Fecha o modal
 */
class TgModalClose extends AbstractRender implements Pluggable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.modal.close';
	
	/**
	 * Construtor
	 */
	public function __construct() {
		
	}

}
?>