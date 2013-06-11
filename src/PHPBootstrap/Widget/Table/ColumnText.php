<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Common\Enum;

/**
 * Coluna de Texto
 */
class ColumnText extends Column {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.column.text';

	// Alinhamentos
	const Left = 'text-left';
	const Center = 'text-center';
	const Right = 'text-right';
	
	/**
	 * Alinhamento
	 *
	 * @var string
	 */
	protected $align;

	/**
	 * Filtro de dados
	 *
	 * @var callback
	 */
	protected $filter;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param string $label
	 */
	public function __construct( $name, $label ) {
		$this->setName($name);
		$this->setLabel($label);
	}

	/**
	 * Obtem o alinhamento do texto
	 *
	 * @return string
	 */
	public function getAlign() {
		return $this->align;
	}

	/**
	 * Atribui alinhamento do texto:
	 * - ColumnText::Left
	 * - ColumnText::Center
	 * - ColumnText::Right
	 *
	 * @param string $align
	 * @throws \UnexpectedValueException
	 */
	public function setAlign( $align ) {
		$this->align = Enum::ensure($align, $this, null);
	}

	/**
	 * Atribui filtro
	 *
	 * @param callback $contextEnabled
	 * @throws \InvalidArgumentException
	 */
	public function setFilter( $filter) {
		if ( ! ( is_callable($filter) || $filter === null ) ) {
			throw new \InvalidArgumentException('filter not is callback');
		}
		$this->filter = $filter;
	}
	
	/**
	 * Obtem filtro
	 *
	 * @return callback
	 */
	public function getFilter() {
		return $this->filter;
	}

}
?>