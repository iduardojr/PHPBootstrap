<?php
namespace PHPBootstrap\Mvc\Routing;

use PHPBootstrap\Mvc\Controller;
use PHPBootstrap\Mvc\Http\HttpRequest;
use PHPBootstrap\Mvc\Http\HttpResponse;

/**
 * Despachador
 */
class Dispatcher implements Dispatchable {

	/**
	 * Controle
	 *
	 * @var Controller
	 */
	protected $controller;

	/**
	 * Ac�o
	 *
	 * @var string
	 */
	protected $action;

	/**
	 * Parametros
	 *
	 * @var array
	 */
	protected $params;

	/**
	 * Falha
	 *
	 * @var \Exception
	 */
	protected $exception;

	/**
	 * Construtor
	 *
	 * @param Controller $controller
	 * @param string $action
	 * @param array $params
	 */
	public function __construct( Controller $controller, $action, array $params ) {
		$this->controller = $controller;
		$this->action = $action;
		$this->params = $params;
	}

	/**
	 *
	 * @see Dispatchable::dispatch()
	 */
	public function dispatch( HttpRequest $request, HttpResponse $response ) {
		try {
			$this->exception = null;
			$request->setQuery(array_merge($request->getQuery(), $this->params));
			$result = call_user_func(array( &$this->controller, $this->action ));
			if ( $result ) {
				$response->setBody($result);
			}
		} catch ( \Exception $e ) {
			$response->setStatus(HttpResponse::InternalServerError);
			$this->exception = $e;
		}
	}

	/**
	 * Obtem o controle
	 *
	 * @return Controller
	 */
	public function getController() {
		return $this->controller;
	}
	
	/**
	 * Obtem a a��o
	 *
	 * @return string
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * Obtem exce��o
	 * 
	 * @return \Exception
	 */
	public function getException() {
		return $this->exception;
	}

}
?>