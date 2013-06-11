<?php
namespace PHPBootstrap\Widget\Modal;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Toggle\Assignable;
use PHPBootstrap\Widget\Toggle\Parameterizable;

/**
 * Alternador que abre o modal e observa
 */
class TgModalOpen extends AbstractRender implements Pluggable, Parameterizable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.modal.open';

	/**
	 * Alternador
	 *
	 * @var Assignable
	 */
	protected $assignable;

	/**
	 * Alvo
	 *
	 * @var Modal
	 */
	protected $target;

	/**
	 * Construtor
	 *
	 * @param Modal $target
	 * @param Assignable $toggle
	 */
	public function __construct( Modal $target, Assignable $toggle = null ) {
		$this->setTarget($target);
		$this->setAssignable($toggle);
	}

	/**
	 * Obtem alvo
	 *
	 * @return Modal
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param Modal $target
	 */
	public function setTarget( Modal $target ) {
		$this->target = $target;
	}

	/**
	 * Obtem Tunel
	 *
	 * @return Assignable
	 */
	public function getAssignable() {
		return $this->assignable;
	}

	/**
	 * Atribui Tunel
	 *
	 * @param Assignable $toggle
	 */
	public function setAssignable( Assignable $toggle = null ) {
		$this->assignable = $toggle;
	}

	/**
	 *
	 * @see Parameterizable::setParameter()
	 */
	public function setParameter( $name, $value ) {
		if ( $this->getAssignable() instanceof Parameterizable ) {
			$this->getAssignable()->setParameter($name, $value);
		}
	}

}
?>