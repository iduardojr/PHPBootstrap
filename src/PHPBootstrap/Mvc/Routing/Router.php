<?php
namespace PHPBootstrap\Mvc\Routing;

use PHPBootstrap\Mvc\Controller;
use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Action\Router as ActionRouter;
use PHPBootstrap\Mvc\Http\HttpRequest;

/**
 * Roteador
 */
class Router implements Routable, ActionRouter {

	/**
	 * Recurso
	 *
	 * @var string
	 */
	protected $resource;

	/**
	 * Padrões
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Validações dos parametros
	 *
	 * @var array
	 */
	protected $constraints;

	/**
	 * Rotas
	 *
	 * @var array
	 */
	protected $routes;

	/**
	 * Rota pai
	 *
	 * @var Router
	 */
	protected $parent;

	/**
	 * Construtor
	 *
	 * @param string $resource
	 * @param array $constraints
	 * @param array $defaults
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $resource, array $constraints = array(), array $defaults = array() ) {
		if ( substr_count($resource, '[') !== substr_count($resource, ']') ) {
			throw new \InvalidArgumentException('resource format invalid');	
		}
		$this->resource = trim($resource);
		$this->constraints = $constraints;
		$this->defaults = $defaults;
		$this->routes = array();
	}

	/**
	 * Obtem os padrões em caso de ausensia
	 *
	 * @return array
	 */
	public function getDefaults() {
		$defaults = array( '__NAMESPACE__' => '', 'controller' => 'index', 'action' => 'index' );
		if ( $this->parent ) {
			return array_merge($defaults, $this->parent->getDefaults(), $this->defaults);
		} else {
			return array_merge($defaults, $this->defaults);
		}
	}

	/**
	 * Obtem recurso
	 *
	 * @return string
	 */
	public function getResource() {
		$resource = '';
		if ( $this->parent ) {
			$resource = trim($this->parent->getResource());
			$resource = rtrim($resource, '/') . '/';
		}
		return $resource . $this->resource;
	}

	/**
	 * Obtem os validações dos parametros
	 *
	 * @return array
	 */
	public function getConstraints() {
		return $this->constraints;
	}

	/**
	 * Atribui o roteador pai
	 *
	 * @param Router $parent
	 */
	public function setParent( Router $parent = null ) {
		$this->parent = $parent;
	}

	/**
	 * Obtem o roteador pai
	 *
	 * @return Router
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Obtem as rotas filhas
	 *
	 * @return array
	 */
	public function getRoutes() {
		return array_values($this->routes);
	}

	/**
	 * Adiciona um rota
	 *
	 * @param Router $route
	 * @throws \RuntimeException
	 */
	public function addRoute( Router $route ) {
		$route->setParent($this);
		$this->routes[spl_object_hash($route)] = $route;
	}

	/**
	 * Remove uma rota
	 *
	 * @param Router $route
	 */
	public function removeRoute( Router $route ) {
		if ( isset($this->routes[spl_object_hash($route)]) ) {
			$route->setParent(null);
			unset($this->routes[spl_object_hash($route)]);
		}
	}

	/**
	 *
	 * @see Routable::match()
	 */
	public function match( HttpRequest $request ) {
		if ( preg_match($this->toRegex(), $request->getUri()) ) {
			$params = $this->toParams($this->getUriPath($request->getUri()));
			$controller = $this->toController($params['controller']);
			$action = $this->formattedAction($params['action']);
			unset($params['controller'], $params['action']);
			if ( $controller && method_exists($controller, $action) ) {
				return new Dispatcher($controller, $action, $params);
			}
		} else {
			foreach ( $this->routes as $route ) {
				$dispatcher = $route->match($request);
				if ( $dispatcher ) {
					return $dispatcher;
				}
			}
		}
		return null;
	}

	/**
	 *
	 * @see Router::toURI()
	 */
	public function toURI( Action $action ) {
		$defaults = $this->getDefaults();
		$resource = $this->getResource();
		$className = $action->getClassName();
		if ( preg_match('/\:controller[^[:alpha:]]?/', $resource) ) {
			$pattern = $defaults['__NAMESPACE__'];
		} else {
			$pattern = $this->formattedController($defaults['controller']);
		}
		if ( preg_match('/^' . preg_quote($pattern) . '/', $className) ) {
			$params = $action->getParameters();
			$params['controller'] = $this->unformattedController($className);
			$params['action'] = $action->getMethodName() ? $this->unformattedAction($action->getMethodName()) : null;
			$uri = $this->buildURIPath($this->buildParts($resource), $params);
			unset($params['controller'], $params['action']);
			if ( count($params) ) {
				$uri .= '?' . http_build_query($params);
			}
			if ( preg_match($this->toRegex(), $uri) ) {
				return $uri;
			}
		}
		foreach ( $this->routes as $route ) {
			$uri = $route->toURI($action);
			if ( $uri ) {
				return $uri;
			}
		}
	}

	/**
	 * Obtem a expressao regular do router
	 *
	 * @return string
	 */
	public function toRegex() {
		$regex = '/^';
		$parts = $this->buildParts($this->getResource());
		foreach ( $parts as $part ) {
			$regex .= $this->buildRegex(key($part), current($part));
		}
		$regex .= '\/?(\?.+)?$/';
		return $regex;
	}

	/**
	 * Gera a expressão regular para cada tipo da parte
	 *
	 * @param string $part
	 * @param string $value
	 * @return string
	 */
	private function buildRegex( $part, $value ) {
		switch ( $part ) {
			case 'literal':
				return preg_quote($value, '/');
				break;
			case 'param':
				$constraints = isset($this->constraints[$value]) ? $this->constraints[$value] : '[a-zA-Z][a-zA-Z0-9_-]+';
				return '(?P<' . $value . '>' . $constraints . ')';
				break;
			case 'optional':
				$regex = '(';
				foreach ( $value as $part ) {
					$regex .= $this->buildRegex(key($part), current($part));
				}
				$regex .= ')?';
				return $regex;
				break;
		}
	}

	/**
	 * Constroi uma estrutura a partir do resource
	 *
	 * @param string $resource
	 * @return array
	 */
	private function buildParts( $resource ) {
		$parts = array();
		$param[] = '(?P<param>:\w+)';
		$param[] = '(?P<optional>\[.+?\]+)';
		$param[] = '\G(?P<literal>[^:\[\]]*)';
		$pattern = '/(' . implode('|', $param) . ')/';
		
		if ( preg_match($pattern, $resource, $match) ) {
			$part = $resource;
			if ( ! empty($match['literal']) ) {
				$part = array( 'literal' => $match['literal'] );
				$resource = substr($resource, strlen($match['literal']));
			} elseif ( ! empty($match['param']) ) {
				$part = array( 'param' => trim($match['param'], ':') );
				$resource = substr($resource, strlen($match['param']));
			} elseif ( ! empty($match['optional']) ) {
				$optional = '';
				do {
					$optional.= $match['optional'];
					$resource = substr($resource, strlen($match['optional']));
					$length = ( substr_count($optional, '[') - substr_count($optional, ']') );
					$match = array();
					preg_match('/(?P<optional>\[.+?\]+)/', $resource, $match);
				} while ( $length > 0 );
				$part = array( 'optional' => $this->buildParts(substr($optional, 1, - 1)) );
			}
			if ( $part !== $resource ) {
				$parts[] = $part;
				if ( ! empty($resource) ) {
					$parts = array_merge($parts, $this->buildParts($resource));
				}
			}
		}
		return $parts;
	}

	/**
	 * Constroi a path do uri a partir dos parametros
	 *
	 * @param array $parts
	 * @param array $params
	 * @return string
	 */
	private function buildURIPath( array $parts, array &$params ) {
		$path = '';
		foreach ( $parts as $part ) {
			$value = current($part);
			$part = key($part);
			switch ( $part ) {
				case 'literal':
					$path .= $value;
					break;
				case 'param':
					if ( isset($params[$value]) ) {
						$path .= $params[$value];
						unset($params[$value]);
					}
					break;
				case 'optional':
					$path .= $this->buildURIPath($value, $params);
					break;
			}
			$path = '/' . trim($path, "/ \t\n\r\0\x0B");
		}
		return $path;
	}

	/**
	 * Obtem o path do uri
	 *
	 * @param string $uri
	 * @return string
	 */
	private function getUriPath( $uri ) {
		if ( preg_match('|^[^\?#]*|', $uri, $match) ) {
			return '/' . trim($match[0], "/ \t\n\r\0\x0B");
		}
		return null;
	}

	/**
	 * Formata o nome do controle
	 *
	 * @param string $unformatted
	 * @return string
	 */
	private function formattedController( $unformatted ) {
		$defaults = $this->getDefaults();
		$search = array('/[_\-]/', '/Controller$/');
		$replace = array(' ', '');
		$formatted = preg_replace($search, $replace, $unformatted);
		$formatted = ucwords($formatted);
		$formatted = str_replace(' ', '', $formatted);
		$namespace = $defaults['__NAMESPACE__'] ? trim($defaults['__NAMESPACE__'], '\\') . '\\' : '';
		$formatted = $namespace . $formatted . 'Controller';
		return $formatted;
	}

	/**
	 * Desformata o nome do controle
	 *
	 * @param string $formatted
	 * @return string
	 */
	private function unformattedController( $formatted ) {
		$search = array('/(\w+\\\\|Controller$)/', '/([A-Z])/');
		$replace = array('', '-$1');
		$unformatted = preg_replace($search, $replace, $formatted);
		$unformatted = trim($unformatted, '-');
		$unformatted = strtolower($unformatted);
		return $unformatted;
	}

	/**
	 * Formata o nome da ação
	 *
	 * @param string $action
	 */
	private function formattedAction( $action ) {
		$search = array( '/[_\-]/', '/Action$/' );
		$replace = array( ' ', '' );
		$formatted = preg_replace($search, $replace, $action);
		$formatted = ucwords($formatted);
		$formatted = str_replace(' ', '', $formatted);
		$formatted = lcfirst($formatted) . 'Action';
		return $formatted;
	}

	/**
	 * Desformata o nome da acao
	 *
	 * @param string $action
	 * @return string
	 */
	private function unformattedAction( $action ) {
		$search = array('/([A-Z])/', '/Action$/');
		$replace = array('-$1', '');
		$unformatted = preg_replace($search, $replace, $action);
		$unformatted = trim($unformatted, '-');
		$unformatted = strtolower($unformatted);
		return $unformatted;
	}

	/**
	 * Instancia um controler
	 *
	 * @param string $controller
	 * @return Controller
	 */
	private function toController( $controller ) {
		$className = $this->formattedController($controller);
		return class_exists($className, true) ? new $className() : null;
	}

	/**
	 * Obtem os parametros
	 *
	 * @param string $path
	 * @return array
	 */
	private function toParams( $path ) {
		$defaults = $this->getDefaults();
		unset($defaults['__NAMESPACE__']);
		$params = array();
		if ( preg_match_all($this->toRegex(), $path, $params) ) {
			foreach ( $params as $param => $value ) {
				if ( preg_match('/[0-9]+/', $param) ) {
					unset($params[$param]);
				} else {
					$value = count($value) == 1 ? $value[0] : $value;
					if (empty($value)) {
						unset($params[$param]);
					} else {
						$params[$param] = $value;
					}
				}
			}
		}
		return array_merge($defaults, $params);
	}
	
}
?>