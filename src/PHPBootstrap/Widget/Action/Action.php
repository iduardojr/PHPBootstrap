<?php
namespace PHPBootstrap\Widget\Action;

/**
 * Aчуo
 */
final class Action {
	
	/**
	 * Roteador
	 *
	 * @var Router
	 */
	protected static $router;

	/**
	 * Nome da classe
	 *
	 * @var string
	 */
	protected $className;

	/**
	 * Nome do metodo
	 *
	 * @var string
	 */
	protected $methodName;

	/**
	 * Parametros
	 *
	 * @var array
	 */
	protected $parameters;

	/**
	 * Construtor
	 *
	 * @param string|object $className
	 * @param string $methodName
	 * @param array $parameters
	 */
	public function __construct( $className, $methodName = null, array $parameters = array() ) {
		$this->setClassName($className);
		$this->setMethodName($methodName);
		$this->parameters = $parameters;
	}
	
	/**
	 * Atribui roteador
	 *
	 * @param Router $router
	 */
	final public static function setRouter( Router $router ) {
		self::$router = $router;
	}

	/**
	 * Obtem nome da classe
	 *
	 * @return string
	 */
	public function getClassName() {
		return $this->className;
	}

	/**
	 * Atribui nome da classe
	 *
	 * @param string|object $className
	 */
	public function setClassName( $className ) {
		$this->className = is_string($className) ? $className : get_class($className);
	}

	/**
	 * Obtem nome do metodo
	 *
	 * @return string
	 */
	public function getMethodName() {
		return $this->methodName;
	}

	/**
	 * Atribui nome do metodo
	 *
	 * @param string $methodName
	 */
	public function setMethodName( $methodName ) {
		$this->methodName = $methodName;
	}

	/**
	 * Atribui um parametro
	 *
	 * @param string $name
	 * @param string $value
	 */
	public function setParameter( $name, $value ) {
		if ( $value === null ) {
			unset($this->parameters[$name]);
		} else {
			$this->parameters[$name] = $value;
		}
	}

	/**
	 * Obtem parametro
	 *
	 * @param string $name
	 * @return string
	 */
	public function getParameter( $name ) {
		return isset($this->parameters[$name]) ? $this->parameters[$name] : null;
	}

	/**
	 * Obtem os paramentros
	 *
	 * @return array
	 */
	public function getParameters() {
		return $this->parameters;
	}

	/**
	 * Gera URI
	 * 
	 * @return string
	 * @throws \RuntimeException
	 */
	public function toURI() {
		if ( ! isset(self::$router) ) {
			throw new \RuntimeException('no exists router');
		}
		return self::$router->toURI($this);
	}

}
?>