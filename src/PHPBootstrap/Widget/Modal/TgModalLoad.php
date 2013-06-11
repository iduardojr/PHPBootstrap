<?php
namespace PHPBootstrap\Widget\Modal;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\TgAjax;

/**
 * Alternador que carrega um modal
 */
class TgModalLoad extends TgAjax {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.modal.load';
	
	/**
	 * Construtor
	 *
	 * @param Action $action
	 * @param Modal $target
	 * @param string $response
	 */
	public function __construct( Action $action, Modal $target, $response = null ) {
		parent::__construct($action, $target, $response);
	}
	
	/**
	 * 
	 * @see TgAjax::setTarget()
	 */
	public function setTarget( Modal $target ) {
		$this->target = $target;
	}
	
}
?>