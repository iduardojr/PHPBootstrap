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
	 * @var TreeComposite
	 */
	protected $target;
	
	/**
	 * Construtor
	 *
	 * @param TreeComposite $target
	 * @param string $toggle
	 */
	public function __construct( TreeComposite $target, $toggle = null ) {
		$this->setTarget($target);
		$this->setToggle($toggle);
	}
	
	/**
	 * Obtem alternador
	 * 
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
	 * @param TreeComposite $target
	 */
	public function setTarget( TreeComposite $target ) {
		$this->target = $target;
	}

}
?>