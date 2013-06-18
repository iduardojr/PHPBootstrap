<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Pagination\Scrolling\Scrollable;

/**
 * Paginador
 */
class Pager extends AbstractPagination {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.pagination.pager';

	/**
	 * Alinhado
	 *
	 * @var boolean
	 */
	protected $aligned;

	/**
	 * Construtor
	 *
	 * @param TgLink $toggle
	 * @param Paginator $paginator
	 * @param Scrollable $scroll
	 */
	public function __construct( TgLink $toggle, Paginator $paginator, Scrollable $scroll = null ) {
		parent::__construct($toggle, $paginator, $scroll);
		$this->setAligned(true);
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