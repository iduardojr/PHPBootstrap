<?php
namespace PHPBootstrap\Widget\Collapse;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Alternador do collapse
 */
class TgCollapse extends AbstractRender implements Pluggable {

	// Tipo do renderizador
	const RendererType = 'phpbootstrap.widget.collapse.toggle';

	/**
	 * Alvo
	 *
	 * @var Collapsible
	 */
	protected $target;

	/**
	 * Construtor
	 *
	 * @param Collapse $target
	 */
	public function __construct( Collapsible $target ) {
		$this->setTarget($target);
	}

	/**
	 * Obtem alvo
	 *
	 * @return Collapsible
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param Collapsible $target
	 */
	public function setTarget( Collapsible $target ) {
		$this->target = $target;
	}

	/**
	 * Obtem container
	 *
	 * @return Container
	 */
	public function getContainer() {
		$container = $this->target->getParent();
		if ( $container instanceof Containable ) {
			return $container;
		}
		return null;
	}

	/**
	 *
	 * @see ToggleDeep::setParameters()
	 */
	public function setParameters( array $parameters ) {
	}

}
?>