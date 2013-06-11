<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Alterna seleחדo da tabela
 */
class TgTableSelect extends AbstractRender implements Pluggable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.toggle';

	// Alternador
	const ToggleAll = 'all';
	const ToggleNone = 'none';

	/**
	 * Alternador
	 *
	 * @var string
	 */
	protected $togglable;

	/**
	 * Alvo
	 *
	 * @var Table
	 */
	protected $target;

	/**
	 * Construtor
	 *
	 * @param Table $target
	 */
	public function __construct( Table $target = null, $togglable = null ) {
		$this->setTarget($target);
	}

	/**
	 * Obtem alvo
	 *
	 * @return Table
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param Table $target
	 */
	public function setTarget( Table $target = null) {
		$this->target = $target;
	}

	/**
	 * Atribui alternador:
	 * - TgTableSelect.ToggleAll
	 * - TgTableSelect.ToggleNone
	 *
	 * @param string $togglable
	 * @throws \UnexpectedValueException
	 */
	public function setTogglable( $togglable ) {
		$this->togglable = Enum::ensure($togglable, $this, null);
	}

	/**
	 * Obtem alternador
	 *
	 * @return string
	 */
	public function getTogglable() {
		return $this->togglable;
	}

	/**
	 *
	 * @see ToggleDeep::setParameters()
	 */
	public function setParameters( array $paramaters ) {
		
	}

}
?>