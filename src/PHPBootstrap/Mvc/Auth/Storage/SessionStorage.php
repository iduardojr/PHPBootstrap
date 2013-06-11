<?php
namespace PHPBootstrap\Mvc\Auth\Storage;

use PHPBootstrap\Mvc\Session\Session;

/**
 * Armazenamento na sessao
 */
class SessionStorage implements Storage {

	/**
	 * Sessão
	 * 
	 * @var Session
	 */
	protected $session;

	/**
	 * Construtor
	 *
	 * @param string $namespace
	 */
	public function __construct( $namespace ) {
		$this->session = new Session($namespace);
	}

	/**
	 *
	 * @see Storage::read()
	 */
	public function read() {
		$this->session->data;
	}

	/**
	 *
	 * @see Storage::write()
	 */
	public function write( $data ) {
		return $this->session->data = $data;
	}

	/**
	 *
	 * @see Storage::clear()
	 */
	public function clear() {
		Session::unregister($this->session);
	}

}
?>