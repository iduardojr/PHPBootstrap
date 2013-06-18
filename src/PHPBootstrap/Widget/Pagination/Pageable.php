<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Widget;

/**
 * Componente de pagina��o
 */
interface Pageable extends Widget {

	/**
	 * Obtem paginador
	 * 
	 * @return Paginator
	 */
	public function getPaginator();
	
}
?>