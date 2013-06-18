<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\Pagination\Scrolling\All;

/**
 * Barra de Paginação
 */
class PagerBar extends AbstractPagination {
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.pagination.pagerbar';

	/**
	 * Construtor
	 *
	 * @param TgLink $toggle
	 * @param Paginator $paginator
	 * @param All $scroll
	 */
	public function __construct( TgLink $toggle, Paginator $paginator, All $scroll = null ) {
		if ( func_num_args() < 3 ) {
			$scroll = new All();
		}
		parent::__construct($toggle, $paginator, $scroll);
		$this->setLabelFirst('<i class="ui-icon-seek-first"></i>');
		$this->setLabelPrev('<i class="ui-icon-seek-prev"></i>');
		$this->setLabelNext('<i class="ui-icon-seek-next"></i>');
		$this->setLabelLast('<i class="ui-icon-seek-end"></i>');
	}

	/**
	 * @see AbstractPagination::setScroll()
	 */
	public function setScroll( All $scroll = null ) {
		$this->scroll = $scroll;
	}
}
?>