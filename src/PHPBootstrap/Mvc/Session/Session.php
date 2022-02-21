<?php
namespace PHPBootstrap\Mvc\Session;

use PHPBootstrap\Common\ArrayIterator;

/**
 * Sess�o
 */
final class Session implements \IteratorAggregate {
	
	/**
	 * Inicializado
	 *
	 * @var boolean
	 */
	private static $started = false;
	
	/**
	 * Gravavel
	 *
	 * @var boolean
	 */
	private static $writable = false;

	/**
	 * Namespace
	 *
	 * @var string
	 */
	private $namespace;

	/**
	 * Construtor
	 *
	 * @param string $namespace
	 */
	public function __construct( $namespace ) {
		self::start();
		$this->namespace = $namespace;
		if (! isset($_SESSION[$this->namespace]) ) {
			$_SESSION[$this->namespace] = array();
		}
	}

	/**
	 * Atribui um valor a sessao
	 *
	 * @param string $name
	 * @param mixed $value
	 * @throws \RuntimeException
	 */
	public function __set( $name, $value ) {
		if ( ! self::$writable ) {
			throw new \RuntimeException('session not is writable');
		}
		$_SESSION[$this->namespace][$name] = $value;
	}

	/**
	 * Obtem um valor da sess�o
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function __get( $name ) {
		return isset($this->$name) ? $_SESSION[$this->namespace][$name] : null;
	}

	/**
	 * Verifica se h� um elemento
	 *
	 * @param string $name
	 * @return boolean
	 */
	public function __isset( $name ) {
		return isset($_SESSION[$this->namespace][$name]);
	}

	/**
	 * Remove um elemento da sess�o
	 *
	 * @param string $name
	 * @throws \RuntimeException
	 */
	public function __unset( $name ) {
		if ( ! self::$writable ) {
			throw new \RuntimeException('session not is writable');
		}
		unset($_SESSION[$this->namespace][$name]);
	}
	
	/**
	 * Converte a sess�o em array
	 *
	 * @return array
	 */
	public function toArray() {
		return $_SESSION[$this->namespace];
	}

	/**
	 *
	 * @see IteratorAggregate::getIterator()
	 */
	public function getIterator() {
		return new ArrayIterator($this->toArray());
	}
	
	/**
	 * Obtem o namespace
	 *
	 * @return string
	 */
	public function getNamespace() {
		return $this->namespace;
	}

	/**
	 * Inicia a sess�o
	 */
	public static function start() {
		if ( ! self::$started ) {
			session_start();
			self::$started = true;
			self::$writable = true;
		}
	}

	/**
	 * Reinicia a sess�o
	 */
	public static function restart() {
		session_regenerate_id(true);
	}

	/**
	 * Encerra a escrita da sess�o
	 */
	public static function close() {
		self::$writable = false;
		session_write_close();
	}

	/**
	 * Destroi a sess�o
	 */
	public static function destroy() {
		self::$writable = false;
		$_SESSION = array();
		setcookie(self::name(), '', time() - 42000);
		session_destroy();
	}

	/**
	 * Obtem/atribui o identificador da sess�o
	 *
	 * @param string $value
	 * @return string
	 */
	public static function id( $value = null ) {
		if ( func_num_args() ) {
			session_id($value);
		} else {
			return session_id();
		}
	}

	/**
	 * Obtem/atribui o nome da sess�o
	 *
	 * @param string $value
	 * @return string
	 */
	public static function name( $value = null ) {
		if ( func_num_args() ) {
			session_name($value);
		} else {
			return session_name();
		}
	}

	/**
	 * Tempo de vida do cookie da sess�o
	 *
	 * @param integer $seconds
	 * @throws \RuntimeException
	 */
	public static function remember( $seconds ) {
		if ( self::$started ) {
			throw new \RuntimeException('session is started');
		}
		session_set_cookie_params(( int ) $seconds);
		session_regenerate_id(false);
	}

	/**
	 * Tempo de vida do cache da sess�o
	 *
	 * @param integer $minutes
	 * @throws \RuntimeException
	 */
	public static function expire( $minutes ) {
		if ( self::$started ) {
			throw new \RuntimeException('session is started');
		}
		session_cache_expire($minutes);
	}

	/**
	 * Configura a sess�o
	 *
	 * @param array $options
	 * @throws \RuntimeException
	 */
	public static function configure( array $options ) {
		if ( self::$started ) {
			throw new \RuntimeException('session is started');
		}
		foreach ( $options as $option => $value ) {
			ini_set('session.' . $option, $value);
		}
	}
	
	/**
	 * Atribui um armazenamento
	 *
	 * @param Storage $storage
	 * @throws \RuntimeException
	 */
	public static function attach( Storage $storage ) {
		if ( self::$started ) {
			throw new \RuntimeException('session is started');
		}
		session_set_save_handler(array( &$storage, 'open' ), array( &$storage, 'close' ), array( &$storage, 'read' ), array( &$storage, 'write' ), array( &$storage, 'destroy' ), array( &$storage, 'gc' ));
	}
	
	/**
	 * Desregitra um namespace da sess�o
	 *
	 * @param string|Session $namespace
	 */
	public static function unregister( $namespace ) {
		if ( $namespace instanceof Session ) {
			$namespace = $namespace->namespace;
		}
		unset($_SESSION[$namespace]);
	}

}
?>