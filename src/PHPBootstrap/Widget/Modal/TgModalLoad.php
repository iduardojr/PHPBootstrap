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
	 * @param Modal $targetModal
	 * @param string $response
	 */
	public function __construct( Action $action, $targetModal, $response = null ) {
		parent::__construct($action, $targetModal, $response);
	}
	
	/**
	 * 
	 * @see TgAjax::setTarget()
	 */
	public function setTarget( $modal ) {
		if ( ! ( is_string($modal) || !empty($modal) || $modal instanceof Modal ) ) {
			throw new \InvalidArgumentException('target not is type string or instance of PHPBootstrap/Widget/Modal/Modal');
		}
		$this->target = $modal;
	}
	
}
?>