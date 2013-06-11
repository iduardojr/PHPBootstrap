<?php
namespace PHPBootstrap\Widget\Pagination;

use PHPBootstrap\Widget\Widget;

/**
 * Pagina de navegaчуo
 */
interface Paginator extends Widget {

	// Paginas
	const PageFirst = 'first';
	const PagePrev = 'prev';
	const PageNext = 'next';
	const PageLast = 'last';

	/**
	 * Atribui total de registros
	 *
	 * @param integer $totalRecords
	 */
	public function setTotalRecords( $totalRecords );

	/**
	 * Atribui quantidade de registros por pagina
	 *
	 * @param integer $recordsPerPage
	 */
	public function setRecordsPerPage( $recordsPerPage );

	/**
	 * Atribui pсgina atual
	 *
	 * @param integer|string $page
	 */
	public function setCurrentPage( $page );
	
}
?>