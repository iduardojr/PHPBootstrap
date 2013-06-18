<?php
namespace PHPBootstrap\Widget\Pagination\Scrolling;

/**
 * Elastico
 */
class Elastic extends Sliding {
	
	/**
	 * Construtor
	 *
	 * @param integer $range
	 */
	public function __construct( $range ) {
		$this->range =  (int) ( $range > 1 ? $range : 1 ) * 2 + 1;
	}
	
}
?>