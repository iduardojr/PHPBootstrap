<?php
namespace PHPBootstrap\Widget\Pagination\Scrolling;

use PHPBootstrap\Widget\Pagination\Paginator;

/**
 * Deslizante
 */
class Sliding implements Scrollable {
	
	/**
	 * Intervalo
	 * 
	 * @var integer
	 */
	protected $range;
	
	/**
	 * Construtor
	 *
	 * @param integer $range
	 */
	public function __construct( $range ) {
		$this->range = (int) $range > 1 ? $range : 1;
	}
	
	/**
	 * @see Scrollable::getPages()
	 */
	public function getPages( Paginator $paginator ) {
		$range = $this->range;
		$current = $paginator->getPage();
		$total = $paginator->getPages();
		
		if ( $range > $total ) {
			return array(1, $total);
		}
		
		$delta = ceil($range / 2);
		if ($current - $delta > $total - $range) {
            return array($total - $range + 1, $total);
        }
		$offset = $current - $delta < 0 ? 0 : $current - $delta;
		$limit = $offset + $range > $total ? $total : $offset + $range;
				
		return array($offset+1, $limit);
	}

}
?>