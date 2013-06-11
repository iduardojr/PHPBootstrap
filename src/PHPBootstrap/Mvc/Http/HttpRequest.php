<?php
namespace PHPBootstrap\Mvc\Http;

use PHPBootstrap\Common\Enum;

/**
 * Requisiчуo Http
 */
class HttpRequest extends HttpMessage {
	
	// Methods
	const Head = 'HEAD';
	const Get = 'GET';
	const Post = 'POST';
	const Put = 'PUT';
	const Delete = 'DELETE';

	/**
	 * Metodo
	 *
	 * @var string
	 */
	protected $method;

	/**
	 * URI
	 *
	 * @var string
	 */
	protected $uri;

	/**
	 * GET
	 *
	 * @var array
	 */
	protected $query;

	/**
	 * POST
	 *
	 * @var array
	 */
	protected $post;

	/**
	 * COOKIES
	 *
	 * @var array
	 */
	protected $cookie;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->setVersion(str_replace('HTTP/', '', $_SERVER['SERVER_PROTOCOL']));
		$this->setMethod($_SERVER['REQUEST_METHOD']);
		$this->setUri($_SERVER['REQUEST_URI']);
		foreach ( $_SERVER as $header => $value ) {
			if ( preg_match('/^HTTP_/', $header) > 0 ) {
				$header = str_replace(array( 'HTTP_', '_' ), array( '', '-' ), $header);
				$this->setHeader($header, $value);
			}
		}
		$this->setQuery($_GET);
		$this->setPost(array_merge($_POST, $_FILES));
		$this->setCookie($_COOKIE);
	}

	/**
	 * Obtem o metodo
	 *
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * Atribui o metodo: - HttpRequest.Head - HttpRequest.Get - HttpRequest.Post
	 * - HttpRequest.Put - HttpRequest.Delete
	 *
	 * @param string $method
	 */
	public function setMethod( $method ) {
		$enum[] = HttpRequest::Head;
		$enum[] = HttpRequest::Get;
		$enum[] = HttpRequest::Post;
		$enum[] = HttpRequest::Put;
		$enum[] = HttpRequest::Delete;
		$this->method = Enum::ensure($method, $enum, HttpRequest::Get);
	}
	
	/**
	 * Obtem o URI
	 *
	 * @return string
	 */
	public function getUri() {
		return $this->uri;
	}

	/**
	 * Atribui o URI
	 *
	 * @param string $uri
	 */
	public function setUri( $uri ) {
		$this->uri = $uri;
	}

	/**
	 * Obtem a linha de requisiчуo
	 *
	 * @return string
	 */
	public function getRequestLine() {
		$line = sprintf('%s %s HTTP/%s', $this->getMethod(), $this->getUri(), $this->getVersion());
		return trim($line);
	}

	/**
	 * Obtem a lista de cabecalhos
	 *
	 * @return array
	 */
	public function getHeaders() {
		return array_merge(array( 'Request-Line' => $this->getRequestLine() ), parent::getHeaders());
	}

	/**
	 * Atribui um cabeчalho
	 *
	 * @param string $header
	 * @param string $value
	 * @throws \InvalidArgumentException
	 */
	public function setHeader( $header, $value = null ) {
		if ( func_num_args() == 1 ) {
			if ( preg_match('/HTTP\/1\..$/', $header) > 0 ) {
				$this->setVersion(preg_match('/HTTP\/1\.0$/', $header) > 0 ? HttpMessage::Http10 : HttpMessage::Http11);
				$header = explode(' ', $header);
				$this->setMethod($header[0]);
				$this->setUri($header[1]);
				return;
			}
			parent::setHeader($header);
		}
		parent::setHeader($header, $value);
	}

	/**
	 * Obtem uma valor ou todos da query string
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getQuery( $name = null ) {
		if ( $name === null ) {
			return $this->query;
		}
		return isset($this->query[$name]) ? $this->query[$name] : null;
	}

	/**
	 * Atribui a query string
	 *
	 * @param array $query
	 */
	public function setQuery( array $query ) {
		$this->query = $query;
	}

	/**
	 * Obtem um valor ou todos do post
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getPost( $name = null ) {
		if ( $name === null ) {
			return $this->post;
		}
		return isset($this->post[$name]) ? $this->post[$name] : null;
	}

	/**
	 * Atribui os dados do post
	 *
	 * @param array $post
	 */
	public function setPost( array $post ) {
		$this->post = $post;
	}

	/**
	 * Obtem um valor ou todos do cookie
	 *
	 * @param string $name
	 * @return array
	 */
	public function getCookie( $name = null ) {
		if ( $name === null ) {
			return $this->cookie;
		}
		return isset($this->cookie[$name]) ? $this->cookie[$name] : null;
	}

	/**
	 * Atribui o valor do cookie
	 *
	 * @param array $cookie
	 */
	public function setCookie( array $cookie ) {
		$this->cookie = $cookie;
	}
	
	/**
	 * Obtem os dados enviados de acordo com o metodo
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getData( $name = null ) {
		if ( $this->isGet() ) {
			return $this->getQuery($name);
		}
		return $this->getPost($name);
	}
	
	/**
	 * Obtem um valor ou todos os dados enviados
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function getRequest( $name = null ) {
		$request = array_merge($this->getQuery(), $this->getPost(), $this->getCookie());
		if ( $name === null ) {
			return $request;
		}
		return isset($request[$name]) ? $request[$name] : null;
	}

	/**
	 * Verifica se o metodo da requisiчуo щ HEAD
	 *
	 * @return boolean
	 */
	public function isHead() {
		return ( $this->method === HttpRequest::Head );
	}

	/**
	 * Verifica se o metodo da requisiчуo щ GET
	 *
	 * @return booleab
	 */
	public function isGet() {
		return ( $this->method === HttpRequest::Get );
	}

	/**
	 * Verifica se o metodo da requisiчуo щ POST
	 *
	 * @return boolean
	 */
	public function isPost() {
		return ( $this->method === HttpRequest::Post );
	}

	/**
	 * Verifica se o metodo da requisiчуo щ PUT
	 *
	 * @return boolean
	 */
	public function isPut() {
		return ( $this->method === HttpRequest::Put );
	}

	/**
	 * Verifica se o metodo da requisiчуo щ DELETE
	 *
	 * @return boolean
	 */
	public function isDelete() {
		return ( $this->method === HttpRequest::Delete );
	}

	/**
	 * Verifica se a requisiчуo щ por XMLHttpRequest JavaScript
	 *
	 * @return boolean
	 */
	public function isXmlHttpRequest() {
		return $this->getHeader('X-Requested-With') === 'XMLHttpRequest';
	}

	/**
	 * Verifica se a requisiчуo veio pelo Adobe Flash
	 *
	 * @return boolean
	 */
	public function isFlashRequest() {
		return stristr($this->getHeader('User-Agent'), ' flash');
	}

}
?>