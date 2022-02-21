<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Widget;

/**
 * Componente de paginaчуo
 */
interface Pageable extends Widget {

	/**
	 * Obtem o paginador
	 * 
	 * @return Paginator
	 */
	public function getPaginator();
	
	/**
	 * Atribui o paginador
	 *
	 * @param Paginator $paginator
	 */
	public function setPaginator(Paginator $paginator);
	
}
?>