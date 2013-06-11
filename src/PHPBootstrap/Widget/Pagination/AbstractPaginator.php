<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Action\TgLink;

/**
 * Paginador Abstrato
 */
abstract class AbstractPaginator extends AbstractWidget implements Paginator {

	/**
	 * Alternador
	 *
	 * @var TgLink
	 */
	protected $toggle;

	/**
	 * Pagina atual
	 *
	 * @var integer
	 */
	protected $currentPage = 1;

	/**
	 * Total de registros
	 *
	 * @var integer
	 */
	protected $totalRecords = 0;

	/**
	 * Regitros por pagina
	 *
	 * @var integer
	 */
	protected $recordsPerPage = 1;

	/**
	 * Rotulo da Primeira Pagina
	 *
	 * @var string
	 */
	protected $labelPageFirst;

	/**
	 * Rotulo da Pagina Anterior
	 *
	 * @var string
	 */
	protected $labelPagePrev;

	/**
	 * Rotulo da Pagina Posterior
	 *
	 * @var string
	 */
	protected $labelPageNext;

	/**
	 * Rotulo da Ultima Pagina
	 *
	 * @var string
	 */
	protected $labelPageLast;

	/**
	 * Construtor
	 *
	 * @param TgLink $toggle
	 */
	public function __construct( TgLink $toggle ) {
		$this->setToggle($toggle);
		$this->setCurrentPage(1);
	}

	/**
	 * Obtem total de registros
	 *
	 * @return integer
	 */
	public function getTotalRecords() {
		return $this->totalRecords;
	}

	/**
	 * 
	 * @see Paginator::setTotalRecords()
	 */
	public function setTotalRecords( $totalRecords ) {
		$this->totalRecords = ( int ) $totalRecords > 0 ? $totalRecords : 0;
	}

	/**
	 * Obtem quantidade de registros por pagina
	 *
	 * @return integer
	 */
	public function getRecordsPerPage() {
		return $this->recordsPerPage;
	}

	/**
	 * 
	 * @see Paginator::setRecordsPerPage()
	 */
	public function setRecordsPerPage( $recordsPerPage ) {
		$this->recordsPerPage = ( int ) $recordsPerPage > 1 ? $recordsPerPage : 1;
	}

	/**
	 * Obtem pagina atual
	 * 
	 * @return integer
	 */
	public function getCurrentPage() {
		return $this->currentPage;
	}

	/**
	 * 
	 * @see Paginator::setCurrentPage()
	 */
	public function setCurrentPage( $page ) {
		switch ( strtolower($page) ) {
			case self::PageFirst:
				$page = 1;
				break;
			
			case self::PagePrev:
				$page = $this->currentPage - 1;
				break;
			
			case self::PageNext:
				$page = $this->currentPage + 1;
				break;
			
			case self::PageLast:
				$page = $this->getTotalPages();
				break;
		}
		
		if ( $page < 1 ) {
			$page = 1;
		} else if ( $page > $this->getTotalPages() ) {
			$page = $this->getTotalPages();
		}
		$this->currentPage = ( int ) $page;
	}

	/**
	 * Obtem total de paginas
	 *
	 * @return integer
	 */
	public function getTotalPages() {
		return max( ceil($this->totalRecords / $this->recordsPerPage), 1);
	}

	/**
	 * Atribui alternador
	 *
	 * @param TgLink $toggle
	 */
	public function setToggle( TgLink $toggle ) {
		$this->toggle = $toggle;
	}

	/**
	 * Obtem alternador
	 *
	 * @return TgLink
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Obtem rotulo da primeira pagina
	 *
	 * @return string
	 */
	public function getLabelPageFirst() {
		return $this->labelPageFirst;
	}

	/**
	 * Atribui rotulo da primeira pagina
	 *
	 * @param string $label
	 */
	public function setLabelPageFirst( $label ) {
		$this->labelPageFirst = $label;
	}

	/**
	 * Obtem rotulo da pagina anterior
	 *
	 * @return string
	 */
	public function getLabelPagePrev() {
		return $this->labelPagePrev;
	}

	/**
	 * Atribui rotulo pagina anterior
	 *
	 * @param string $label
	 */
	public function setLabelPagePrev( $label ) {
		$this->labelPagePrev = $label;
	}

	/**
	 * Obtem rotulo da pagina posterior
	 *
	 * @return string
	 */
	public function getLabelPageNext() {
		return $this->labelPageNext;
	}

	/**
	 * Atribui rotulo da pagina posterior
	 *
	 * @param string $label
	 */
	public function setLabelPageNext( $label ) {
		$this->labelPageNext = $label;
	}

	/**
	 * Obtem rotulo da ultima pagina
	 *
	 * @return string
	 */
	public function getLabelPageLast() {
		return $this->labelPageLast;
	}

	/**
	 * Atribui rotulo da pagina posterior
	 *
	 * @param string $label
	 */
	public function setLabelPageLast( $label ) {
		$this->labelPageLast = $label;
	}

	/**
	 * Atribui os rotulos
	 * 
	 * @param string $first
	 * @param string $prev
	 * @param string $next
	 * @param string $last
	 */
	public function setLabelPages( $first, $prev, $next, $last ) {
		$this->setLabelPageFirst($first);
		$this->setLabelPagePrev($prev);
		$this->setLabelPageNext($next);
		$this->setLabelPageLast($last);
	}
	
	/**
	 * Obtem o intervalo de paginas
	 *
	 * @return stdClass{start,end}
	 */
	public function getRangeOfPages() {
		$range = new \stdClass();
		$range->start = 1;
		$range->end = $this->getTotalPages();
	
		if ( $this->getLimitPages() < $this->getTotalPages() ) {
				
			$middle = floor($this->getLimitPages() / 2);
			$range->start = $this->getCurrentPage() - $middle + ( $this->getLimitPages() % 2 ? 0 : 1 );
			$range->end = $this->getCurrentPage() + $middle;
				
			if ( $range->start < 1 ) {
				$range->start = 1;
				$range->end = $this->getLimitPages();
			}
				
			if ( $range->end > $this->getTotalPages() ) {
				$range->start = $this->getTotalPages() - $this->getLimitPages() + 1;
				$range->end = $this->getTotalPages();
			}
		}
	
		return $range;
	}
	
	/**
	 * Obtem limite de paginas
	 *
	 * @return integer
	 */
	protected function getLimitPages() {
		return $this->getTotalPages();
	}
	

}
?>