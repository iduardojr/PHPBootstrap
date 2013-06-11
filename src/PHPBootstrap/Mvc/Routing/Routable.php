<?php
namespace PHPBootstrap\Mvc\Routing;

use PHPBootstrap\Mvc\Http\HttpRequest;

/**
 * Interface de um roteador
 */
interface Routable {

	/**
	 * Encontra um despachador
	 *
	 * @param HttpRequest $request
	 * @return Dispatchable
	 */
	public function match( HttpRequest $request );

}
?>