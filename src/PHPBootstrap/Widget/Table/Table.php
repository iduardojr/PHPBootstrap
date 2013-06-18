<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Pagination\Pageable;

/**
 * Tabela
 */
class Table extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table';
	
	// Estilo
	const Hover = 'table-hover';
	const Striped = 'table-striped';
	const Bordered = 'table-bordered';
	const Condensed = 'table-condensed';
	
	// Contexto
	const Info 	  = 'info';
	const Success = 'success';
	const Warning = 'warning';
	const Error  = 'error';

	/**
	 * Estilos
	 *
	 * @var array
	 */
	protected $styles;

	/**
	 * Descriчуo
	 *
	 * @var string
	 */
	protected $caption;

	/**
	 * Contexto de linha
	 *
	 * @var \Closure
	 */
	protected $contextRow;

	/**
	 * Fonte de dados
	 *
	 * @var DataSource
	 */
	protected $dataSource;

	/**
	 * Alerta de nao haver registros
	 *
	 * @var string
	 */
	protected $alertNoRecords;

	/**
	 * Paginaчуo
	 *
	 * @var Pageable
	 */
	protected $pagination;

	/**
	 * Rodape
	 *
	 * @var Widget
	 */
	protected $footer;

	/**
	 * Colunas
	 *
	 * @var ArrayCollection
	 */
	protected $columns;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param DataSource $ds
	 */
	public function __construct( $name, DataSource $ds ) {
		$this->columns = new ArrayCollection();
		$this->setName($name);
		$this->setDataSource($ds);
		$this->setStyle(null);
	}

	/**
	 * Obtem os estilos
	 * 
	 * @return array
	 */
	public function getStyles() {
		return $this->styles;
	}
	
	/**
	 * Atribui um estilo:
	 * - Table.Hover
	 * - Table.Striped
	 * - Table.Bordered
	 * - Table.Condensed
	 * 
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		if ( $style === null) {
			$this->styles = array();
		} else {
			$enum[] = Table::Hover;
			$enum[] = Table::Striped;
			$enum[] = Table::Bordered;
			$enum[] = Table::Condensed;
			$this->styles[] = Enum::ensure($style, $enum);
			$this->styles = array_unique($this->styles);
		}
	}

	/**
	 * Obtem descriчуo
	 *
	 * @return string
	 */
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Atribui descriчуo
	 *
	 * @param string $caption
	 */
	public function setCaption( $caption ) {
		$this->caption = $caption;
	}

	/**
	 * Obtem Rodape
	 *
	 * @return Widget
	 */
	public function getFooter() {
		return $this->footer;
	}

	/**
	 * Atribui rodape
	 *
	 * @param Widget $footer
	 */
	public function setFooter( Widget $footer = null ) {
		$this->footer = $footer;
	}

	/**
	 * Obtem contexto da linha
	 *
	 * @return \Closure
	 */
	public function getContextRow() {
		return $this->contextRow;
	}

	/**
	 * Atribui contexto de linha
	 *
	 * @param \Closure $handler
	 */
	public function setContextRow( \Closure $handler = null ) {
		$this->contextRow = $handler;
	}

	/**
	 * Atribui fonte de dados
	 *
	 * @param DataSource $ds
	 */
	public function setDataSource( DataSource $ds ) {
		$this->dataSource = $ds;
	}

	/**
	 * Obtem fonte de dados
	 *
	 * @return DataSource
	 */
	public function getDataSource() {
		return $this->dataSource;
	}

	/**
	 * Adiciona coluna
	 *
	 * @param Column $column
	 */
	public function addColumn( Column $column ) {
		$column->setTable($this);
		$this->columns->append($column);
	}
	
	/**
	 * Remove coluna
	 *
	 * @param Column $column
	 */
	public function removeColumn( Column $column ) {
		$this->columns->remove($column);
	}

	/**
	 * Obtem colunas
	 *
	 * @return ArrayIterator
	 */
	public function getColumns() {
		return $this->columns->getIterator();
	}

	/**
	 * Obtem Paginaчуo
	 *
	 * @return Pageable
	 */
	public function getPagination() {
		return $this->pagination;
	}

	/**
	 * Atribui Paginaчуo
	 *
	 * @param Pageable $pagination
	 */
	public function setPagination( Pageable $pagination = null ) {
		$this->pagination = $pagination;
	}

	/**
	 * Obtem alerta de nao haver registros
	 *
	 * @return string
	 */
	public function getAlertNoRecords() {
		return $this->alertNoRecords;
	}

	/**
	 * Atribui alerta de nao haver registros
	 *
	 * @param string $alertNoRecords
	 */
	public function setAlertNoRecords( $alertNoRecords ) {
		$this->alertNoRecords = $alertNoRecords;
	}
	
}
?>