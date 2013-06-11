<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Action\TgLink;

/**
 * Paginador
 */
class Pager extends AbstractPaginator {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.pagination.pager';

	/**
	 * Alinhado
	 *
	 * @var boolean
	 */
	protected $aligned;

	/**
	 * Limite de paginas
	 *
	 * @var integer
	 */
	protected $limitPages;

	/**
	 * Construtor
	 *
	 * @param TgLink $toggle
	 * @param integer $limitPages
	 */
	public function __construct( TgLink $toggle, $limitPages = 0 ) {
		parent::__construct($toggle);
		$this->setAligned(true);
		$this->setLimitPages($limitPages);
	}

	/**
	 * Obtem limite de paginas
	 *
	 * @return integer
	 */
	public function getLimitPages() {
		return $this->limitPages === null ? $this->getTotalPages() : $this->limitPages;
	}

	/**
	 * Atribui limite de laginas
	 *
	 * @param integer|null $limitPages
	 */
	public function setLimitPages( $limitPages ) {
		if ( isset($limitPages) ) {
			$this->limitPages = ( int ) $limitPages < 0 ? 0 : $limitPages;
		} else {
			$this->limitPages = null;
		}
	}

	/**
	 * Obtem o alinhamento as bordas
	 *
	 * @return boolean
	 */
	public function getAligned() {
		return $this->aligned;
	}

	/**
	 * Atribui o alinhamento as bordas
	 *
	 * @param boolean $aligned
	 */
	public function setAligned( $aligned ) {
		$this->aligned = ( bool ) $aligned;
	}

}
?>