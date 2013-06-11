<?php
namespace PHPBootstrap\Widget\Form;

use PHPBootstrap\Widget\Toggle\Assignable;
use PHPBootstrap\Widget\Action\Action;

/**
 * Envia Formulario
 */
class TgFormSubmit extends Togglable implements Assignable {
	

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.toggle.submit';
	
	/**
	 * A��o
	 *
	 * @var Action
	 */
	protected $action;

	/**
	 * Valida o formulario
	 *
	 * @var boolean
	 */
	protected $validate;

	/**
	 * Construtor
	 *
	 * @param Action $action
	 * @param Form $target
	 * @param boolean $validade
	 */
	public function __construct( Action $action, Form $target, $validate = true ) {
		$this->setAction($action);
		$this->setTarget($target);
		$this->setValidate($validate);
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
	
	/**
	 *
	 * @see Parameterizable::setParameter()
	 */
	public function setParameter( $name, $value ) {
		$this->action->setParameter($name, $value);
	}

	/**
	 * Obtem valida��o
	 *
	 * @return boolean
	 */
	public function getValidate() {
		return $this->validate;
	}

	/**
	 * Atribui valida��o
	 *
	 * @param boolean $validate
	 */
	public function setValidate( $validate ) {
		$this->validate = $validate;
	}

}
?>