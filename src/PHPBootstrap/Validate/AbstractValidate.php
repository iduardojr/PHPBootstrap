<?php
namespace PHPBootstrap\Validate;

/**
 * Valida��o
 */
abstract class AbstractValidate implements Validate {
	
	/**
	 * Identifica��o da valida��o
	 * 
	 * @var string
	 */
	const IDENTIFY = null;

	/**
	 * Mensagem
	 * 
	 * @var string
	 */
	protected $message;
	
	/**
	 * Contexto
	 * 
	 * @var mixed
	 */
	protected $context;
	
	/**
	 * Obtem a identifica��o da valida��o
	 *
	 * @return string
	 */
	public function getIdentify() {
		return static::IDENTIFY;
	}
	
	/**
	 * Obtem contexto
	 *
	 * @return mixed
	 */
	public function getContext() {
		return $this->context;
	}

	/**
	 * Obtem a mensagem
	 * 
	 * @return string
	 */
	public function getMessage() {
		return $this->message ? $this->message : $this->getDefaultMessage();
	}

	/**
	 * Atribui a mensagem
	 * 
	 * @param string $message
	 */
	public function setMessage( $message ) {
		$this->message = $message;
	}

	/**
	 * Afirma se � um valor valido
	 * 
	 * @param mixed $value
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	public function assert( $value ) {
		if ( !$this->valid($value) ) {
			throw new \InvalidArgumentException(sprintf($this->getMessage(), $value));
		}
	}
	
	/**
	 * Obtem uma mensagem default
	 * 
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not valid';
	}
	
}
?>