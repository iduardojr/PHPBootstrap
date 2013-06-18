<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Widget;

/**
 * Componente de paginaчуo
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