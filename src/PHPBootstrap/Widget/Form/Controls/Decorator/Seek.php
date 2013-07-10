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
	 * Aчуo
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
	 * Obtem aчуo
	 *
	 * @return Action
	 */
	public function getAction() {
		return $this->action;
	}
	
	/**
	 * Atribui aчуo
	 *
	 * @param Action $action
	 */
	public function setAction( Action $action ) {
		$this->action = $action;
	}

}
?>