<?php
namespace PHPBootstrap\Validate;

use PHPBootstrap\Validate\Required\Requirable;
use PHPBootstrap\Validate\Pattern\Pattern;
use PHPBootstrap\Validate\Length\Length;

/**
 * Validador
 */
class Validator implements Validatable {

	/**
	 * Requerido
	 *
	 * @var Requirable
	 */
	protected $required;

	/**
	 * Padrão
	 *
	 * @var Pattern
	 */
	protected $pattern;

	/**
	 * Tamanho
	 *
	 * @var Length
	 */
	protected $length;

	/**
	 * Mensagens de erro
	 *
	 * @var array
	 */
	protected $messages;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->messages = array();
	}

	/**
	 * Obtem validador requerido
	 *
	 * @return Requirable
	 */
	public function getRequired() {
		return $this->required;
	}

	/**
	 * Atribui validador requerido
	 *
	 * @param Requirable $rule
	 */
	public function setRequired( Requirable $rule = null ) {
		$this->required = $rule;
	}

	/**
	 * Obtem validador padrão
	 * 
	 * @return Pattern
	 */
	public function getPattern() {
		return $this->pattern;
	}

	/**
	 * Atribui validador padrão
	 * 
	 * @param Pattern $rule
	 */
	public function setPattern( Pattern $rule = null ) {
		$this->pattern = $rule;
	}

	/**
	 * Obtem validador do tamanho
	 * 
	 * @return Length
	 */
	public function getLength() {
		return $this->length;
	}

	/**
	 * Atribui validador do tamanho
	 * 
	 * @param Length $rule
	 */
	public function setLength( Length $rule = null ) {
		$this->length = $rule;
	}

	/**
	 * Valida um valor
	 * 
	 * @return boolean
	 */
	public function valid( $value ) {
		$this->messages = array();
		$valid = true;
		foreach ( $this->getValidate() as $rule ) {
			if ( ! $rule->valid($value) ) {
				$this->messages[$rule->getIdentify()] = $rule->getMessage();
				$valid = false;
			}
		}
		return $valid;
	}

	/**
	 * Obtem as mensagens de erro
	 * 
	 * @return array
	 */
	public function getMessages() {
		return $this->messages;
	}
	
	/**
	 * Obtem as validações
	 * 
	 * @return array
	 */
	function getValidate() {
		$rules = array();
		if ( $this->required ) {
			$rules[] = $this->required;
		}
		if ( $this->pattern ) {
			$rules[] = $this->pattern;
		}
		if ( $this->length ) {
			$rules[] = $this->length;
		}
		return $rules;
	}

}
?>