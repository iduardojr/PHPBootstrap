<?php
namespace PHPBootstrap\Widget\Tab;

use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Alternador de tab
 */
class TgTab extends AbstractRender implements Pluggable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tab.toggle';

	/**
	 * Alvo
	 *
	 * @var Tab
	 */
	protected $target;

	/**
	 * Construtor
	 *
	 * @param Tabbable $target
	 */
	public function __construct( Tabbable $target ) {
		$this->setTarget($target);
	}

	/**
	 * Obtem alvo
	 *
	 * @return Tabbable
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param Tabbable $target
	 */
	public function setTarget( Tabbable $target ) {
		$this->target = $target;
	}

	/**
	 *
	 * @see ToggleDeep::setParameters()
	 */
	public function setParameters( array $parameters ) {
	}

}
?>