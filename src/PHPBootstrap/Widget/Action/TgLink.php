<?php
namespace PHPBootstrap\Widget\Action;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Toggle\Assignable;
use PHPBootstrap\Widget\Toggle\Parameterizable;

/**
 * Alternador de link
 */
class TgLink extends AbstractRender implements Parameterizable, Pluggable, Assignable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.action.link';

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

	/**
	 *
	 * @see Parameterizable::setParameter()
	 */
	public function setParameter( $name, $value ) {
		$this->action->setParameter($name, $value);
	}

}
?>