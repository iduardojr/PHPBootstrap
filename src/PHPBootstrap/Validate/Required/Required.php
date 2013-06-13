<?php
namespace PHPBootstrap\Validate\Required;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Requirable;

/**
 * Obrigatуrio
 */
class Required extends AbstractValidate implements Requirable {

	/**
	 * Identificaзгo do validaзгo
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
		if ( $this->context ) {
			if ( ! $this->notEmpty($this->context->getContextValue()) ) {
				return true;
			}
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
	 * Verifica se um valor nгo й vazio
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