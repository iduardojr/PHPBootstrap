<?php
namespace PHPBootstrap\Mvc\Routing;

use PHPBootstrap\Mvc\Http\HttpRequest;
use PHPBootstrap\Mvc\Http\HttpResponse;

/**
 * Interface de um despachador
 */
interface Dispatchable {

	/**
	 * Dispacha a requisi��o
	 *
	 * @param HttpRequest $request
	 * @param HttpResponse $response
	 */
	public function dispatch( HttpRequest $request, HttpResponse $response );

	/**
	 * Obtem o controle
	 *
	 * @return Controller
	 */
	public function getController();

	/**
	 * Obtem a a��o
	 *
	 * @return string
	 */
	public function getAction();

	/**
	 * Obtem a exce��o em caso de falha
	 * 
	 * @return \Exception
	 */
	public function getException();

}
?>