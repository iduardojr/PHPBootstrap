<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Action\TgLink;

/**
 * Barra de Paginação
 */
class PagerBar extends AbstractPaginator {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.pagination.pagerbar';
	
	/**
	 * Construtor
	 *
	 * @param TgLink $toggle
	 */
	public function __construct( TgLink $toggle ) {
		parent::__construct($toggle);
		$this->setLabelPageFirst('<i class="ui-icon-seek-first"></i>');
		$this->setLabelPagePrev('<i class="ui-icon-seek-prev"></i>');
		$this->setLabelPageNext('<i class="ui-icon-seek-next"></i>');
		$this->setLabelPageLast('<i class="ui-icon-seek-end"></i>');
	}
	
}
?>