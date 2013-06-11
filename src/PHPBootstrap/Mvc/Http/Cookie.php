<?php
namespace PHPBootstrap\Mvc\Http;

/**
 * Cookie
 */
class Cookie {

	/**
	 * Nome
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Valor
	 *
	 * @var mixed
	 */
	protected $value;

	/**
	 * Tempo de vida
	 *
	 * @var integer
	 */
	protected $expire;

	/**
	 * Diretorio
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Dominio
	 *
	 * @var string
	 */
	protected $domain;

	/**
	 * Trasmite por HTTPS
	 *
	 * @var boolean
	 */
	protected $secure;

	/**
	 * Somente por HTTP
	 *
	 * @var boolean
	 */
	protected $httpOnly;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param mixed $value
	 * @param mixed $expire
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $name, $value, $expire = 0 ) {
		$this->setName($name);
		$this->setValue($value);
		$this->setExpire($expire);
		$this->setSecure(isset($_SERVER['HTTPS']));
		$this->setHttpOnly(isset($_SERVER['HTTPS']));
	}

	/**
	 * Obtem o nome de identificação do cookie
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Atribui o nome de identificação do cookie
	 *
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * Obtem o valor do cookie
	 *
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Atribui o valor do cookie
	 *
	 * @param mixed $value
	 * @throws \InvalidArgumentException
	 */
	public function setValue( $value ) {
		if ( is_array($value) ) {
			foreach ( $value as $v ) {
				if ( ! ( is_scalar($v) || is_null($v) ) ) {
					throw new \InvalidArgumentException('value of cookie not is type scalar');
				}
			}
		} else {
			if ( ! ( is_scalar($value) || is_null($value) ) ) {
				throw new \InvalidArgumentException('value of cookie not is type scalar');
			}
		}
		$this->value = $value;
	}

	/**
	 * Obtem o timestamp para expirar o cookie
	 *
	 * @return integer
	 */
	public function getExpire() {
		return $this->expire;
	}

	/**
	 * Atribui a data de expiração do cookie
	 *
	 * @param string|integer|DateTime $expire
	 * @throws \InvalidArgumentException
	 */
	public function setExpire( $expire ) {
		if ( $expire === null || $expire === '' ) {
			$expire = 0;
		}
		if ( is_string($expire) ) {
			$expire = strtotime($expire);
		}
		if ( $expire instanceof \DateTime ) {
			if ( count($expire->getLastErrors()) == 0 ) {
				$expire = $expire->getTimestamp();
			}
		}
		if ( is_numeric($expire) ) {
			$this->expire = ( int ) $expire > 0 ? $expire : 0;
			return;
		}
		throw new \InvalidArgumentException('date of expire in cookie not is valid');
	}

	/**
	 * Obtem o diretorio
	 *
	 * @return string
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * Atribui o diretorio
	 *
	 * @param string $path
	 */
	public function setPath( $path ) {
		$this->path = $path;
	}

	/**
	 * Obtem o dominio
	 *
	 * @return string
	 */
	public function getDomain() {
		return $this->domain;
	}

	/**
	 * Atribui o dominio
	 *
	 * @param string $domain
	 */
	public function setDomain( $domain ) {
		$this->domain = $domain;
	}

	/**
	 * Obtem se deve ser transmitido com conexao segura (HTTPS)
	 *
	 * @return boolean
	 */
	public function getSecure() {
		return $this->secure;
	}

	/**
	 * Atribui se deve ser transmitido com conexao segura (HTTPS)
	 *
	 * @param boolean $secure
	 */
	public function setSecure( $secure ) {
		$this->secure = ( bool ) $secure;
	}

	/**
	 * Obtem se o cookie será trasmitido apenas por HTTP
	 *
	 * @return boolean
	 */
	public function getHttpOnly() {
		return $this->httpOnly;
	}

	/**
	 * Atribui se o cookie será transmitido apenas por HTTP
	 *
	 * @param boolean $httpOnly
	 */
	public function setHttpOnly( $httpOnly ) {
		$this->httpOnly = ( bool ) $httpOnly;
	}

	/**
	 * Converte o cookie em uma string
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->toString();
	}
	
	/**
	 * Converte o cookie em uma string
	 *
	 * @return string
	 */
	public function toString() {
		$cookies = array();
		$append = array();
		if ( $this->expire > 0 ) {
			$append[] = 'expire=' . gmdate('D, d-M-Y H:i:s T', $this->expire);
		}
		if ( $this->path ) {
			$append[] = 'path=' . $this->path;
		}
		if ( $this->domain ) {
			$append[] = 'domain=' . $this->domain;
		}
		if ( $this->secure ) {
			$append[] = 'secure';
		}
		if ( $this->httpOnly ) {
			$append[] = 'httponly';
		}
		$append = empty($append) ? '' : '; ' . implode('; ', $append);
	
		if ( is_array($this->value) ) {
			foreach ( $this->value as $key => $value ) {
				$cookies[] = $this->name . '[' . $key . ']=' . urlencode($value) . $append;
			}
		} else {
			$cookies[] = $this->name . '=' . urlencode($this->value) . $append;
		}
		return implode("\r", $cookies);
	}

	/**
	 * Converte uma string em uma coleção de cookies
	 * 
	 * @return array
	 */
	public static function fromString( $string ) {
		$collection = explode("\r", $string);
		$cookies = array();
		foreach ( $collection as $cookie ) {
			$cookie = $this->toArrayCookie($cookie);
			$cookies = array_merge_recursive($cookies, array( $cookie['name'] => $cookie ));
		}
		$collection = array();
		foreach ( $cookies as $cookie ) {
			$cookie = new Cookie($cookie['name'], $cookie['value'], $cookie['expire']);
			$cookie->setDomain($cookie['domain']);
			$cookie->setPath($cookie['path']);
			$cookie->setSecure($cookie['secure']);
			$cookie->setHttpOnly($cookie['httponly']);
			$collection[] = $cookie;
		}
		return $collection;
	}

	/**
	 * Converte uma string cookie em um array
	 *
	 * @param string $cookie
	 * @return array
	 */
	private static function toArrayCookie( $cookie ) {
		$pattern = '/^(?P<name>\w+)(\[(?P<key>.+)\])?=(?P<value>.*?);';
		$pattern .= '( expire=(?P<expire>.*?);)?';
		$pattern .= '( path=(?P<path>.*?);)?';
		$pattern .= '( domain=(?P<domain>.*?);)?';
		$pattern .= '( (?P<secure>secure);)?';
		$pattern .= '( (?P<httponly>httponly);)?/';
		
		$matches = array();
		if ( preg_match_all($pattern, trim($cookie) . ';', $matches) ) {
			foreach ( $matches as $key => $value ) {
				if ( preg_match('/[0-9]+/', $key) ) {
					unset($matches[$key]);
				} else {
					$matches[$key] = $matches[$key][0];
				}
			}
			$matches['value'] = urldecode($matches['value']);
			if ( isset($matches['key']) ) {
				$key = $matches['key'];
				unset($matches['key']);
				$matches['value'] = array( $key => $matches['value'] );
			}
		}
		return $matches;
	}

}
?>