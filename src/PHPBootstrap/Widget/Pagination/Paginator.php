<?php
namespace PHPBootstrap\Widget\Pagination;

/**
 * Paginador
 */
class Paginator {
	
	// Paginas
	const PageFirst = 'first';
	const PagePrev = 'prev';
	const PageNext = 'next';
	const PageLast = 'last';
	
	/**
	 * Total
	 * 
	 * @var integer
	 */
	protected $total;
	
	/**
	 * Limite
	 * 
	 * @var integer
	 */
	protected $limit;
	
	/**
	 * Pagina atual
	 * 
	 * @var integer
	 */
	protected $page = 1;
	
	/**
	 * Construtor
	 *
	 * @param integer $total
	 * @param integer $limit
	 * @param integer $page
	 */
	public function __construct( $total, $limit, $page = 1 ) {
		$this->setTotal($total);
		$this->setLimit($limit);
		$this->setPage($page);
	}
	
	/**
	 * Obtem o total
	 *
	 * @return integer
	 */
	public function getTotal() {
		return $this->total;
	}
	
	/**
	 * Atribui total
	 *
	 * @param integer $total
	 */
	public function setTotal( $total ) {
		$this->total = ( int ) $total > 0 ? $total : 0;
	}
	
	/**
	 * Obtem limite
	 *
	 * @return integer
	 */
	public function getLimit() {
		return $this->limit;
	}
	
	/**
	 * Atribui limite e redefine a pagina atual
	 *
	 * @param integer $limit
	 */
	public function setLimit( $limit ) {
		if ( $limit > 0 ) {
			$offset = $this->getOffset();
			$this->setPage(ceil($offset / $limit));
		} else {
			$limit = 0;
			$this->setPage(1);
		}
		$this->limit = ( int ) $limit;
	}
	
	/**
	 * Atribui a pagina atual
	 *
	 * @param integer|string $page
	 */
	public function setPage( $page ) {
		switch ( strtolower($page) ) {
			case self::PageFirst:
				$page = 1;
				break;
			
			case self::PagePrev:
				$page = $this->page - 1;
				break;
			
			case self::PageNext:
				$page = $this->page + 1;
				break;
			
			case self::PageLast:
				$page = $this->getTotalPages();
				break;
		}
		$this->page = ( int ) $page < 1 ? 1 : $page > $this->getPages() ? $this->getPages() : $page;
	}
	
	/**
	 * Obtem a pagina atual
	 *
	 * @return integer
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * Obtem o total de paginas
	 *
	 * @return integer
	 */
	public function getPages() {
		return max( $this->getLimit() > 0 ? ceil($this->getTotal() / $this->getLimit()) : 0, 1); 
	}
	
	/**
	 * Obtem a posição do primeiro elemento
	 *
	 * @return integer
	 */
	public function getOffset() {
		return ( $this->getPage() - 1 ) * $this->getLimit();
	}
	
	/**
	 * Obtem o intervalo dos elementos
	 *
	 * @return integer
	 */
	public function getRange() {
		if ( $this->getTotal() > 0 ) {
			if ( $this->getLimit() > 0 ) {
				$offset = $this->getOffset() + 1;
				$limit = $this->getOffset() + $this->getLimit();
				$limit = $limit > $this->getTotal() ? $this->getTotal() : $limit;
				
				return array( $offset, $limit );
			}
			return array(1, $this->getTotal());
		}
		return array(0, 0);
	}
}
?>