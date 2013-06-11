<?php
namespace PHPBootstrap\Validate\Required;

/**
 * Obrigat�rio
 */
class Required extends Requirable {

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
	 */
	public function __construct( Context $context = null ) {
		$this->context = $context;
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