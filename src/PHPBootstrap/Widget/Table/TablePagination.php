<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\AbstractPaginator;

/**
 * Paginaчуo da tabela
 */
class TablePagination extends AbstractWidget implements Paginator {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.pagination';

	/**
	 * Paginador
	 *
	 * @var AbstractPaginator
	 */
	protected $paginator;

	/**
	 * Limites
	 *
	 * @var array
	 */
	protected $limits = array();

	/**
	 * Aчуo do limite
	 *
	 * @var TgLink
	 */
	protected $toggleLimits;

	/**
	 * Construtor
	 *
	 * @param AbstractPaginator $paginator
	 */
	public function __construct( AbstractPaginator $paginator ) {
		$this->setPaginator($paginator);
	}

	/**
	 * Atribui paginador
	 *
	 * @param AbstractPaginator $paginator
	 */
	public function setPaginator( AbstractPaginator $paginator ) {
		$this->paginator = $paginator;
	}

	/**
	 * Obtem paginaчуo
	 *
	 * @return AbstractPaginator
	 */
	public function getPaginator() {
		return $this->paginator;
	}

	/**
	 * Obtem Limites
	 *
	 * @return array
	 */
	public function getLimits() {
		return $this->limits;
	}

	/**
	 * Obtem alternador dos limites
	 *
	 * @return TgLink
	 */
	public function getToggleLimits() {
		return $this->toggleLimits;
	}

	/**
	 * Atribui limites
	 *
	 * @param TgLink $toggle
	 * @param integer $limit1
	 * @param integer $limit2
	 * @param integer ...
	 */
	public function setLimits( TgLink $toggle, $limit1, $limit2 ) {
		$this->toggleLimits = $toggle;
		$limits = func_get_args();
		array_shift($limits);
		$this->limits = $limits;
	}
	
	/**
	 * Remove os limites
	 */
	public function setNotLimits() {
		$this->toggleLimits = null;
		$this->limits = array();
	}

	/**
	 *
	 * @see Paginator::setTotalRecords()
	 */
	public function setTotalRecords( $totalRecords ) {
		$this->paginator->setTotalRecords($totalRecords);
	}

	/**
	 *
	 * @see Paginator::setRecordsPerPage()
	 */
	public function setRecordsPerPage( $recordsPerPage ) {
		$this->paginator->setRecordsPerPage($recordsPerPage);
	}

	/**
	 *
	 * @see Paginator::setCurrentPage()
	 */
	public function setCurrentPage( $page ) {
		$this->paginator->setCurrentPage($page);
	}

}
?>