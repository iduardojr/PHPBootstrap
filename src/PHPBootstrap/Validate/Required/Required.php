<?php
namespace PHPBootstrap\Validate\Required;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Requirable;

/**
 * Obrigat�rio
 */
class Required extends AbstractValidate implements Requirable {

	/**
	 * Identifica��o do valida��o
	 *
	 * @var string
	 */
	const IDENTIFY = 'required';
	
	/**
	 * Construtor
	 *
	 * @param Context $context
	 * @param string $message
	 */
	public function __construct( Context $context = null, $message = null ) {
		$this->context = $context;
		$this->setMessage($message);
	}
	
	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		if ( ! empty($this->context) && ! $this->context->isDependency() ) {
			return true;
		}
		return $this->notEmpty($value);
	}
	
	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		return 'invalid value: can not be empty';
	}
	
	/**
	 * Verifica se um valor n�o � vazio
	 *
	 * @param mixed $value
	 * @return boolean
	 */
	private function notEmpty( $value ) {
		if ( is_string($value) ) {
			return strlen(trim($value)) > 0;
		}
		return ! empty($value);
	}
	
}
?>