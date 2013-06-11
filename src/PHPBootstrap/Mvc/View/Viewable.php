<?php
namespace PHPBootstrap\Mvc\View;

use PHPBootstrap\Mvc\Http\HttpResponse;

/**
 * Interface de uma view
 */
interface Viewable {

	/**
	 * Visita uma Resposta
	 *
	 * @param HttpResponse $response
	 */
	public function accept( HttpResponse $response );

	/**
	 * Converte objeto em string
	 * 
	 * @return string
	 */
	public function __toString();

}
?>