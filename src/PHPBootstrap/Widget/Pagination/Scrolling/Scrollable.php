<?php
namespace PHPBootstrap\Widget\Pagination\Scrolling;

use PHPBootstrap\Widget\Pagination\Paginator;

/**
 * Interface de rolagem de paginaчуo
 */
interface Scrollable {

	/**
	 * Obtem o intervalo de paginas
	 * 
	 * @param Paginator $paginator
	 * @return array
	 */
	public function getPages( Paginator $paginator );
}
?>