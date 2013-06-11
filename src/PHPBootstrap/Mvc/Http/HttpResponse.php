<?php
namespace PHPBootstrap\Mvc\Http;

use PHPBootstrap\Mvc\View\Viewable;

/**
 * Resposta Http
 */
class HttpResponse extends HttpMessage {

	// INFORMATIONAL CODES
	const Continues = 100;
	const SwitchingProtocols = 101;
	const Processing = 102;
	
	// SUCCESSFUL CODES
	const Ok = 200;
	const Created = 201;
	const NonAuthoritativeInformation = 203;
	const NoContent = 204;
	const ResetContent = 205;
	const PartialContent = 206;
	const MultiStatus = 207;
	const AlreadyReported = 208;
	
	// REDIRECTION CODES
	const MultipleChoices = 300;
	const MovedPermanently = 301;
	const Found = 302;
	const MovedTemporarily = 302;
	const SeeOther = 303;
	const NotModified = 304;
	const UseProxy = 305;
	const SwitchProxy = 306;
	const TemporaryRedirect = 307;
	const PermanentRedirect = 308;
	
	// CLIENT ERROR
	const BadRequest = 400;
	const Unauthorized = 401;
	const PaymentRequired = 402;
	const Forbidden = 403;
	const NotFound = 404;
	const MethodNotAllowed = 405;
	const NotAcceptable = 406;
	const ProxyAuthenticationRequired = 407;
	const RequestTimeOut = 408;
	const Conflict = 409;
	const Gone = 410;
	const LengthRequired = 411;
	const PreconditionFailed = 412;
	const RequestEntityTooLarge = 413;
	const RequestURITooLarge = 414;
	const UnsupportedMediaType = 415;
	const RequestedRangeNotSatisfiable = 416;
	const ExpectationFailed = 417;
	const IamATeapot = 418;
	const EnhanceYourCalm = 420;
	const UnprocessableEntity = 422;
	const Locked = 423;
	const FailedDependency = 424;
	const MethodFailure = 424;
	const UnorderedCollection = 425;
	const UpgradeRequired = 426;
	const PreconditionRequired = 428;
	const TooManyRequests = 429;
	const RequestHeaderFieldsTooLarge = 431;
	const NoResponse = 444;
	const RetryWith = 449;
	const BlockedByWindowsParentalControls = 450;
	const UnavailableForLegalReasons = 451;
	const Redirect = 451;
	const RequestHeaderTooLarge = 494;
	const CertError = 495;
	const NoCert = 496;
	const HTTPtoHTTPS = 497;
	const ClientClosedRequest = 499;
	
	// SERVER ERROR
	const InternalServerError = 500;
	const NotImplemented = 501;
	const BadGateway = 502;
	const ServiceUnavailable = 503;
	const GatewayTimeOut = 504;
	const HTTPVersionNotSupported = 505;
	const VariantAlsoNegotiates = 506;
	const InsufficientStorage = 507;
	const LoopDetected = 508;
	const BandwidthLimitExceeded = 509;
	const NotExtended = 510;
	const NetworkAuthenticationRequired = 511;
	const NetworkReadTimeoutError = 598;
	const NetworkConnectTimeoutError = 599;
	
	/**
	 * Mensagens Default
	 *
	 * @var array
	 */
	protected static $defaultMessages = array(
        // INFORMATIONAL CODES
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // SUCCESSFUL CODES
        200 => 'Ok',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        // REDIRECTION CODES
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Switch Proxy', 
        307 => 'Temporary Redirect',
		308 => 'Permanent Redirect',
        // CLIENT ERROR
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Large',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        420 => 'Enhance Your Calm', 
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency', 
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        444 => 'No Response',
        449 => 'Retry With', 
        450 => 'Blocked by Windows Parental Controls',
        451 => 'Unavailable For Legal Reasons', 
        494 => 'Request Header Too Large',
        495 => 'Cert Error',
        496 => 'No Cert',
        497 => 'HTTP to HTTPS', 
        499 => 'Client Closed REquest', 
        // SERVER ERROR
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        509 => 'Bandwidth Limit Exceeded', //
        510 => 'Not Extended', //
        511 => 'Network Authentication Required', 
        598 => 'Network read timeout error', //
        599 => 'Network connect timeout error', //
    );

	/**
	 * Codigo do status
	 *
	 * @var integer
	 */
	protected $statusCode;

	/**
	 * Mensagem do status
	 *
	 * @var string
	 */
	protected $statusText;

	/**
	 * Corpo
	 *
	 * @var string
	 */
	protected $body;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->setStatus(self::Ok);
		$this->setVersion(str_replace('HTTP/', '', $_SERVER['SERVER_PROTOCOL']));
	}

	/**
	 * Obtem o codigo do status da resposta
	 *
	 * @return integer
	 */
	public function getStatusCode() {
		return $this->statusCode;
	}

	/**
	 * Obtem a messagem do status da resposta
	 *
	 * @return string
	 */
	public function getStatusText() {
		return $this->statusText;
	}

	/**
	 * Atribui status
	 *
	 * @param integer $code
	 * @param string $text
	 * @throws \UnexpectedValueException
	 */
	public function setStatus( $code, $text = null ) {
		if ( ! isset(self::$defaultMessages[$code]) ) {
			throw new \UnexpectedValueException('status http invalid');
		}
		$this->statusCode = $code;
		if ( func_num_args() == 1 ) {
			$text = self::$defaultMessages[$code];
		}
		$this->statusText = $text;
	}

	/**
	 * Obtem a lista de cabecalhos
	 *
	 * @return array
	 */
	public function getHeaders() {
		return array_merge(array( 'Status-Line' => $this->getStatusLine() ), parent::getHeaders());
	}

	/**
	 * Atribui um cabeçalho
	 *
	 * @param string $header
	 * @param string $value
	 * @throws \InvalidArgumentException
	 */
	public function setHeader( $header, $value = null ) {
		if ( func_num_args() == 1 ) {
			if ( preg_match('/^HTTP', $header) > 0 ) {
				$this->setVersion(preg_match('/^HTTP\/1\.0/', $header) > 0 ? HttpMessage::Http10 : HttpMessage::Http11);
				$header = explode(' ', $header);
				if ( count($header) == 3 ) {
					$this->setStatus($header[1], isset($header[2]));
				} else {
					$this->setStatus($header[1]);
				}
				return;
			} 
			parent::setHeader($header);
		} 
		parent::setHeader($header, $value);
	}
	
	/**
	 * Atribui um cookie
	 *
	 * @param Cookie $cookie
	 */
	public function setCookie( Cookie $cookie ) {
		$oldCookie = $this->getCookie($cookie->getName());
		if ( $oldCookie ) {
			$key = array_search($oldCookie, $this->headers['Set-Cookie']);
			$this->headers['Set-Cookie'][$key] = $cookie;
			return null;
		}
		$this->headers['Set-Cookie'][] = $cookie;
	}

	/**
	 * Remove um cookie a ser setado
	 *
	 * @param string|Cookie $cookie
	 */
	public function removeCookie( $cookie ) {
		if ( isset($this->headers['Set-Cookie']) ) {
			if ( is_string($cookie) ) {
				$cookie = $this->getCookie($cookie);
			}
			$key = array_search($cookie, $this->headers['Set-Cookie']);
			unset($this->headers['Set-Cookie'][$key]);
			if ( empty($this->headers['Set-Cookie']) ) {
				unset($this->headers['Set-Cookie']);
			}
		}
	}

	/**
	 * Obtem um cookie
	 *
	 * @param string $name
	 * @return Cookie
	 */
	public function getCookie( $name ) {
		if ( isset($this->headers['Set-Cookie']) ) {
			foreach ( $this->headers['Set-Cookie'] as $cookie ) {
				if ( $cookie->getName() === $name ) {
					return $cookie;
				}
			}
		}
		return null;
	}

	/**
	 * Obtem a lista de cookies a serem setados
	 *
	 * @return array
	 */
	public function getCookies() {
		return isset($this->headers['Set-Cookie']) ? $this->headers['Set-Cookie'] : array();
	}

	/**
	 * Obtem corpo da resposta
	 *
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Atribui corpo da resposta
	 *
	 * @param string $body
	 */
	public function setBody( $body ) {
		if ( null !== $body && ! is_string($body) && ! is_numeric($body) && ! is_callable(array( $body, '__toString' )) ) {
			throw new \UnexpectedValueException('The Response content must be a string or object implementing __toString(), "' . gettype($body) . '" given.');
		}
		if ( $body instanceof Viewable ) {
			$body->accept($this);
		}
		$this->body = $body;
	}

	/**
	 * Obtem a linha de status
	 *
	 * @return string
	 */
	public function getStatusLine() {
		$line = sprintf('HTTP/%s %d %s', $this->getVersion(), $this->getStatusCode(), $this->getStatusText());
		return trim($line);
	}

	/**
	 * Verifica se o estado atual é Informativa
	 *
	 * @return bool
	 */
	public function isInformational() {
		$code = $this->getStatusCode();
		return ( $code >= 100 && $code < 200 );
	}
	
	/**
	 * Verifica se o estado atual é Sucesso
	 *
	 * @return bool
	 */
	public function isSuccessful() {
		$code = $this->getStatusCode();
		return ( 200 <= $code && 300 > $code );
	}
	
	/**
	 * Verifica se o estado atual é um redirecionamento
	 *
	 * @return bool
	 */
	public function isRedirection() {
		$code = $this->getStatusCode();
		return ( 300 <= $code && 400 > $code );
	}

	/**
	 * Verifica se o estado atual é Erro de Cliente
	 *
	 * @return boolean
	 */
	public function isClientError() {
		$code = $this->getStatusCode();
		return ( $code < 500 && $code >= 400 );
	}
	
	/**
	 * Verifica se o estado atual é Erro de Servidor
	 *
	 * @return bool
	 */
	public function isServerError() {
		$code = $this->getStatusCode();
		return ( 500 <= $code && 600 > $code );
	}
	
	/**
	 * Verifica se o estado atual é Ok
	 *
	 * @return bool
	 */
	public function isOk() {
		return ( self::Ok === $this->getStatusCode() );
	}
	
	/**
	 * Verifica se a requisição foi negada pelo ACL
	 *
	 * @return bool
	 */
	public function isForbidden() {
		return ( self::Forbidden == $this->getStatusCode() );
	}
	
	/**
	 * Verifica se a requisição não foi encontrada
	 *
	 * @return bool
	 */
	public function isNotFound() {
		return ( self::NotFound === $this->getStatusCode() );
	}

	/**
	 * É a respospa de um redirecionamento de alguma forma
	 *
	 * @param string $location
	 * @return Boolean
	 */
	public function isRedirect( $location = null ) {
		return in_array($this->statusCode, array( self::Created, self::MovedPermanently, self::Found, self::SeeOther, self::TemporaryRedirect, self::PermanentRedirect )) && ( null === $location ?  : $location == $this->headers['Location'] );
	}

	/**
	 * Verifica se a resposta é vazia
	 *
	 * @return Boolean
	 */
	public function isResponseEmpty() {
		return in_array($this->statusCode, array( self::Created, self::NoContent, self::ResetContent, self::Found, self::SeeOther, self::NotModified ));
	}
	
	/**
	 * Redireciona para uma url
	 *
	 * @param string $url
	 * @param integer $code
	 * @param string $text
	 */
	public function redirect( $url, $code = 302, $text = null ) {
		if ( !( 300 <= $code && 400 > $code ) ) {
			throw new \UnexpectedValueException('code status not is valid for redirection');
		}
		$this->setHeader('Location', $url);
		if ( func_num_args() > 2 ) {
			$this->setStatus($code, $text);
		} else {
			$this->setStatus($code);
		}
	}
	
	/**
	 * Envia a resposta
	 *
	 * @return void
	 */
	public function send() {
		foreach ( $this->getHeaders() as $header ) {
			header($header);
		}
		if ( $this->isResponseEmpty() ) {
			echo $this->getBody();
		}
	}

}
?>