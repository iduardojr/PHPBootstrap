<?php
namespace PHPBootstrap\Widget\Pagination\Scrolling;

use PHPBootstrap\Widget\Pagination\Paginator;

/**
 * Todos
 */
class All implements Scrollable {

	/**
	 * Construtor
	 */
	public function __construct() {
		
	}

	/**
	 * @see Scrollable::getPages()
	 */
	public function getPages( Paginator $paginator ) {
		return array(1, $paginator->getPages());
	}
}
?>