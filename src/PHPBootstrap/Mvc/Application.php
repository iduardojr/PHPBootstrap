<?php
namespace PHPBootstrap\Mvc;

use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Mvc\Http\HttpRequest;
use PHPBootstrap\Mvc\Routing\Router;

/**
 * Controlador Frontal
 */
class Application {

	/**
	 * Variaveis
	 *
	 * @var array
	 */
	protected $vars = array();

	/**
	 * Roteador
	 *
	 * @var Router
	 */
	protected $router;

	/**
	 * Plugins
	 *
	 * @var array
	 */
	protected $plugins = array();

	/**
	 * Construtor
	 *
	 * @param Router $router
	 */
	public function __construct( Router $router ) {
		$this->setRouter($router);
	}

	/**
	 * Atribui roteador
	 *
	 * @param Router $router
	 */
	public function setRouter( Router $router ) {
		$this->router = $router;
	}

	/**
	 * Obtem roteador
	 *
	 * @return Router
	 */
	public function getRouter() {
		return $this->router;
	}

	/**
	 * Anexa um plugin
	 *
	 * @param Plugin $plugin
	 */
	public function attach( Plugin $plugin ) {
		$this->plugins[spl_object_hash($plugin)] = $plugin;
	}

	/**
	 * Desanexa um plugin
	 *
	 * @param Plugin $plugin
	 */
	public function detach( Plugin $plugin ) {
		unset($this->plugins[spl_object_hash($plugin)]);
	}

	/**
	 * Atribui variavel
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set( $name, $value ) {
		if ( is_null($value) ) {
			unset($this->vars[$name]);
		} else {
			$this->vars[$name] = $value;
		}
	}

	/**
	 * Obtem variavel
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function __get( $name ) {
		return isset($this->vars[$name]) ? $this->vars[$name] : null;
	}

	/**
	 * Executa um metodo
	 *
	 * @param string $name
	 * @param array $arguments
	 * @return mixed
	 * @throws \BadMethodCallException
	 */
	public function __call( $name, array $arguments ) {
		if ( is_callable($this->$name) ) {
			return call_user_func_array($this->$name, $arguments);
		}
		throw new \BadMethodCallException('unssupported operation: "' . get_class($this) . '::' . $name . '()"');
	}

	/**
	 * Executa a aplica��o
	 *
	 * @param HttpRequest $request
	 * @param HttpResponse $response
	 */
	public function run( HttpRequest $request = null, HttpResponse $response = null ) {
		if ( $request === null ) {
			$request = new HttpRequest();
		}
		if ( $response === null ) {
			$response = new HttpResponse();
		}
		$dispatcher = $this->router->match($request);
		if ( $dispatcher === null ) {
			$response->setStatus(HttpResponse::NotFound);
			$dispatched = true;
		} else {
			$dispatcher->getController()->setRequest($request);
			$dispatcher->getController()->setResponse($response);
			$dispatcher->getController()->setApplication($this);
			$dispatched = false;
		}	
		foreach ( $this->plugins as $plugin ) {
			if ( $plugin->preDispatch($request, $response, $dispatcher) === false ) {
				$dispatched = true;
			}
		}
		
		if ( ! $dispatched ) {
			$dispatcher->dispatch($request, $response);
		}
		
		foreach ( $this->plugins as $plugin ) {
			$plugin->postDispatch($request, $response, $dispatcher);
		}
		
		$response->send();
		
	}

}
?>