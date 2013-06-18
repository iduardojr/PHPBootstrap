<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Pagination\Scrolling\Scrollable;
use PHPBootstrap\Widget\Pagination\Scrolling\All;

/**
 * Paginaчуo
 */
class Pagination extends AbstractPagination {

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
	 * Construtor
	 *
	 * @param TgLink $toggle
	 * @param Paginator $paginator
	 * @param Scrollable $scroll
	 */
	public function __construct( TgLink $toggle, Paginator $paginator, Scrollable $scroll = null ) {
		if ( func_num_args() < 3 ) {
			$scroll = new All();
		}
		parent::__construct($toggle, $paginator, $scroll);
		$this->setLabel('&laquo;', null, null, '&raquo;');
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