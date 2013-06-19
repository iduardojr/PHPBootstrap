<?php
namespace PHPBootstrap\Mvc;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Mvc\Http\HttpResponse;
use PHPBootstrap\Mvc\Http\HttpRequest;

/**
 * Controlador
 */
abstract class Controller {

	/**
	 * Aplicaчуo
	 *
	 * @var Application
	 */
	protected $application;

	/**
	 * Requisiчуo
	 *
	 * @var HttpRequest
	 */
	protected $request;

	/**
	 * Resposta
	 *
	 * @var HttpResponse
	 */
	protected $response;

	/**
	 * Construtor
	 */
	public function __construct() {
		
	}
	
	/**
	 * Atribui a requisiчуo
	 *
	 * @param HttpRequest $request
	 */
	public function setRequest( HttpRequest $request = null ) {
		$this->request = $request;
	}

	/**
	 * Obtem a requisiчуo
	 *
	 * @return HttpRequest
	 */
	public function getRequest() {
		if ( ! $this->request ) {
			$this->request = new HttpRequest();
		}
		return $this->request;
	}

	/**
	 * Atribui a resposta
	 *
	 * @param HttpResponse $response
	 */
	public function setResponse( HttpResponse $response = null ) {
		$this->response = $response;
	}

	/**
	 * Obtem a resposta
	 *
	 * @return HttpResponse
	 */
	public function getResponse() {
		if ( ! $this->response ) {
			$this->response = new HttpResponse();
		}
		return $this->response;
	}

	/**
	 * Atribui aplicaчуo
	 *
	 * @param Application $application
	 */
	public function setApplication( Application $application = null ) {
		$this->application = $application;
	}

	/**
	 * Obtem aplicaчуo
	 *
	 * @return Application
	 */
	public function getApplication() {
		return $this->application;
	}

	/**
	 * Redireciona a pagina
	 *
	 * @param string|Action $url
	 */
	public function redirect( $url ) {
		if ($url instanceof Action) {
			$url = $url->toURI();
		}
		$this->response->redirect($url);
	}

	/**
	 * Obtem variavel da aplicaчуo
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function __get( $name ) {
		return $this->application ? $this->application->$name : null;
	}

	/**
	 * Executa um metodo da aplicaчуo
	 *
	 * @param string $name
	 * @param array $arguments
	 * @return mixed
	 * @throws \BadMethodCallException
	 */
	public function __call( $name, array $arguments ) {
		if ( $this->application ) {
			return $this->application->__call($name, $arguments);
		}
		throw new \BadMethodCallException('unssupported operation: "' . get_class($this) . '::' . $name . '()"');
	}

	/**
	 * Obtem o nome da classe
	 *
	 * @return string
	 */
	public static function getClass() {
		return get_called_class();
	}

}
?>