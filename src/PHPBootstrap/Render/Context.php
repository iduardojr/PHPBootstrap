<?php
namespace PHPBootstrap\Render;

/**
 * Contexto de renderizaчуo
 */
class Context {
	
	/**
	 * Propriedades
	 * 
	 * @var array
	 */
	protected $properties;

	/**
	 * Resposta
	 *
	 * @var Response
	 */
	protected $response;

	/**
	 * Construtor
	 */
	public function __construct( Response $response = null ) {
		$this->properties = array();
		if ( $response ) {
			$this->setResponse($response);
		}
	}
	
	/**
	 * Atribui resposta
	 *
	 * @param Response $response
	 */
	public function setResponse( Response $response ) {
		$this->response = $response;
	}

	/**
	 * Obtem o objeto resposta
	 *
	 * @return Response
	 */
	public function getResponse() {
		return $this->response;
	}
	
	/**
	 * Atribui uma propriedade
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public function setProperty( $name, $value ) {
		if ( $value === null ) {
			unset($this->properties[$name]);
		} else {
			$this->properties[$name] = $value;
		}
	}

	/**
	 * Obtem propriedade
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getProperty( $name ) {
		return $this->hasProperty($name) ? $this->properties[$name] : null;
	}

	/**
	 * Verifica se uma propriedade existe
	 * 
	 * @param string $name
	 */
	public function hasProperty( $name ) {
		return isset($this->properties[$name]);
	}

	/**
	 * Obtem todas propriedades
	 *
	 * @return array
	 */
	public function getProperties() {
		return $this->properties;
	}

}
?>