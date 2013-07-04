<?php
namespace PHPBootstrap\Widget\Tree;

use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Common\Enum;

/**
 * Alternador de tree
 */
class TgTree extends AbstractRender implements Pluggable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tree.toggle';
	
	// Alternadores
	const Collapse = 'collapse';
	const Expand = 'expand';
	const Toggle = 'toggle';
	
	/**
	 * Alternador
	 * 
	 * @var string
	 */
	protected $toggle;
	
	/**
	 * Alvo
	 * 
	 * @var Tree
	 */
	protected $target;
	
	/**
	 * Construtor
	 *
	 * @param Tree $target
	 * @param string $toggle
	 */
	public function __construct( Tree $target, $toggle = null ) {
		$this->setTarget($target);
		$this->setToggle($toggle);
	}
	
	/**
	 * Obterm alternador
	 * @return string
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Atribui alternador
	 * 
	 * @param string $toggle
	 */
	public function setToggle( $toggle ) {
		$this->toggle = Enum::ensure($toggle, $this, self::Toggle);
	}

	/**
	 * Obtem o alvo
	 * 
	 * @return Tree
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui o alvo
	 * 
	 * @param Tree $target
	 */
	public function setTarget( Tree $target ) {
		$this->target = $target;
	}

}
?>