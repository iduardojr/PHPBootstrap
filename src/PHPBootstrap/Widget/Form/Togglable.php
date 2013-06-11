<?php
namespace PHPBootstrap\Widget\Form;

use PHPBootstrap\Widget\Toggle\Togglable as Toggle;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Alternador abstrato de formulario
 */
abstract class Togglable extends AbstractRender implements Toggle {

	/**
	 * Alvo
	 *
	 * @var Form
	 */
	protected $target;

	/**
	 * Construtor
	 * 
	 * @param Form $target
	 */
	public function __construct( Form $target ) {
		$this->setTarget($target);
	}
	
	/**
	 * Obtem alvo
	 *
	 * @return Form
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param Form $target
	*/
	public function setTarget( Form $target ) {
		$this->target = $target;
	}

}
?>