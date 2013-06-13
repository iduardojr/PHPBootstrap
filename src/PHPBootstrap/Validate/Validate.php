<?php
namespace PHPBootstrap\Validate;

/**
 * Validaчуo
 */
abstract class Validate {

	/**
	 * Identificaчуo da validaчуo
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
	 * Obtem a identificaчуo da validaчуo
	 *
	 * @return string
	 */
	public function getIdentify() {
		return static::IDENTIFY;
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
	 * Afirma se щ um valor valido
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
	
	/**
	 * Valida um valor
	 *
	 * @param mixed $value
	 * @return boolean
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	abstract public function valid( $value );
	
	/**
	 * Obtem o parametro
	 *
	 * @return mixed
	 * @throws \RuntimeException
	 */
	abstract public function getParameter();
}
?>