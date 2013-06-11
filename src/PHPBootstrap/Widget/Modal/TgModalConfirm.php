<?php
namespace PHPBootstrap\Widget\Modal;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Alternador para confirmação em modal
 */
class TgModalConfirm extends AbstractRender implements Pluggable  { 
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.modal.confirm';
	
	/**
	 * Construtor
	 */
	public function __construct() {
	
	}

}
?>