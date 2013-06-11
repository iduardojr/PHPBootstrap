<?php
namespace PHPBootstrap\Mvc;

use PHPBootstrap\Mvc\Http\HttpRequest;
use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Mvc\Routing\Dispatcher;

/**
 * Interface de um plugin
 */
interface Plugin {

	/**
	 * Antes de despachar aчуo do controle
	 * 
	 * @param HttpRequest $request
	 * @param HttpResponse $response
	 * @param Dispatcher $dispatcher
	 * @return boolean
	 */
	public function preDispatch( HttpRequest $request, HttpResponse $response, Dispatcher $dispatcher = null );

	/**
	 * Depois de despachar aчуo do controle
	 * 
	 * @param HttpRequest $request
	 * @param HttpResponse $response
	 * @param Dispatcher $dispatcher
	 */
	public function postDispatch( HttpRequest $request, HttpResponse $response, Dispatcher $dispatcher = null );
}
?>