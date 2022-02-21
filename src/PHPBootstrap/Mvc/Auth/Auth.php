<?php
namespace PHPBootstrap\Mvc\Auth;

use PHPBootstrap\Mvc\Auth\Storage\Storage;
use PHPBootstrap\Mvc\Auth\Adapter\Adapter;

/**
 * Autentica��o
 */
class Auth {
	
	// Result
	const Sucess = 1;
	const Failure = 0;
	const IdentityEmpty = -1;
	const CredentialEmpty = -2;
	const IdentityNotFound = -3;
	const CredentialInvalid = -5;

	/**
	 * Armazenamento
	 *
	 * @var Storage
	 */
	protected $storage;

	/**
	 * Adaptador
	 *
	 * @var Adapter
	 */
	protected $adapter;

	/**
	 * Construtor
	 * 
	 * @param Storage $storage
	 * @param Adapter $adpater
	 */
	public function __construct( Storage $storage, Adapter $adapter ) {
		$this->storage = $storage;
		$this->adapter = $adapter;
	}

	/**
	 * Autentica
	 * 
	 * @param string $identity
	 * @param string $credential
	 * @return integer
	 */
	public function authenticate( $identity, $credential ) {
		if (empty($identity)) {
			return self::IdentityEmpty;
		}
		if (empty($credential)) {
			return self::CredentialEmpty;
		}
		try {
			if (! $this->adapter->getByIdentity($identity)){
				return self::IdentityNotFound;
			}
			if ( $this->adapter->algoSecure($this->adapter->getCredential()) !== $credential) {
				return self::CredentialInvalid;
			}
			$this->storage->write($this->adapter->getData());
		} catch (\Exception $e) {
			return self::Failure;
		}
		return self::Sucess;
	}
	
	/**
	 * Obtem a identidade armazenada
	 * @return mixed
	 */
	public function getIdentity() {
		return $this->storage->read();
	}
	
	/**
	 * Verifica se ha uma identidade autenticada
	 * @return boolean
	 */
	public function isAuthenticated() {
		return  $this->getIdentity() !== null;
	}
	
	/**
	 * Limpa identidade registrada
	 */
	public function logout() {
		$this->storage->clear();
	}

}
?>