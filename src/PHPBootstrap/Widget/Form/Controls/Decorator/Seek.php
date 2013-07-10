<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Busca
 */
class Seek extends AbstractRender implements Suggestible {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.seek';
	
	/**
	 * A��o
	 *
	 * @var Action
	 */
	protected $action;
	
	/**
	 * Construtor
	 *
	 * @param Action $action
	 */
	public function __construct( Action $action ) {
		$this->setAction($action);
	}
	
	/**
	 * Obtem a��o
	 *
	 * @return Action
	 */
	public function getAction() {
		return $this->action;
	}
	
	/**
	 * Atribui a��o
	 *
	 * @param Action $action
	 */
	public function setAction( Action $action ) {
		$this->action = $action;
	}

}
?>