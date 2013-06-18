<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Pagination\Pageable;
use PHPBootstrap\Widget\Pagination\Paginator;
use PHPBootstrap\Widget\Pagination\AbstractPagination;

/**
 * Paginaчуo da tabela
 */
class TablePagination extends AbstractWidget implements Pageable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.pagination';

	/**
	 * Paginaчуo
	 *
	 * @var AbstractPagination
	 */
	protected $pagination;

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
	 * @param AbstractPagination $pagination
	 */
	public function __construct( AbstractPagination $pagination ) {
		$this->setPagination($pagination);
	}

	/**
	 * Atribui paginador
	 *
	 * @param AbstractPagination $pagination
	 */
	public function setPagination( AbstractPagination $pagination ) {
		$this->pagination = $pagination;
	}

	/**
	 * Obtem paginaчуo
	 *
	 * @return AbstractPagination
	 */
	public function getPagination() {
		return $this->pagination;
	}
	
	/**
	 * Obtem o paginador
	 *
	 * @return Paginator
	 */
	public function getPaginator() {
		return $this->getPagination()->getPaginator();
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

}
?>