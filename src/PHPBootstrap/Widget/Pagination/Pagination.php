<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Action\TgLink;

/**
 * Paginação
 */
class Pagination extends AbstractPaginator {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.pagination';
	
	// Alinhamento
	const Left = 'pagination-left';
	const Center = 'pagination-centered';
	const Right = 'pagination-right';
	
	// Tamanho
	const Large = 'pagination-large';
	const Small = 'pagination-small';
	const Mini = 'pagination-mini';
	
	/**
	 * Alinhamento
	 *
	 * @var string
	 */
	protected $align;
	
	/**
	 * Tamanho
	 *
	 * @var string
	 */
	protected $size;
	
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
	public function __construct( TgLink $toggle, $limitPages = null ) {
		parent::__construct($toggle);
		$this->setLimitPages($limitPages);
		$this->setLabelPages('&laquo;', null, null, '&raquo;');
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
	 * Atribui tamanho:
	 * - Pagination.Large
	 * - Pagination.Small
	 * - Pagination.Mini
	 *
	 * @param string $size
	 * @throws \UnexpectedValueException
	 */
	public function setSize( $size ) {
		$enum[] = Pagination::Large;
		$enum[] = Pagination::Small;
		$enum[] = Pagination::Mini;
		$this->size = Enum::ensure($size, $enum, null);
	}

	/**
	 * Obtem tamanho
	 *
	 * @return string
	 */
	public function getSize() {
		return $this->size;
	}

	/**
	 * Obtem o alinhamento
	 * 
	 * @return string
	 */
	public function getAlign() {
		return $this->align;
	}

	/**
	 * Atribui alinhamento:
	 * - Pagination.Left
	 * - Pagination.Center
	 * - Pagination.Right
	 *
	 * @param string $align
	 * @throws \UnexpectedValueException
	 */
	public function setAlign( $align ) {
		$enum[] = Pagination::Left;
		$enum[] = Pagination::Center;
		$enum[] = Pagination::Right;
		$this->align = Enum::ensure($align, $enum, null);
	}
	
}
?>