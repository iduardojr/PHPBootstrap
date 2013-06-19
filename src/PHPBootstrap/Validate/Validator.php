<?php
namespace PHPBootstrap\Validate;

/**
 * Validador
 */
class Validator {

	/**
	 * Requerido
	 *
	 * @var Requirable
	 */
	protected $required;

	/**
	 * Padrão
	 *
	 * @var Patternable
	 */
	protected $pattern;

	/**
	 * Tamanho
	 *
	 * @var Measurable
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
	 * @return Patternable
	 */
	public function getPattern() {
		return $this->pattern;
	}

	/**
	 * Atribui validador padrão
	 * 
	 * @param Patternable $rule
	 */
	public function setPattern( Patternable $rule = null ) {
		$this->pattern = $rule;
	}

	/**
	 * Obtem validador do tamanho
	 * 
	 * @return Measurable
	 */
	public function getLength() {
		return $this->length;
	}

	/**
	 * Atribui validador do tamanho
	 * 
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		$this->length = $rule;
	}

	/**
	 * Valida um valor
	 * 
	 * @param mixed $value
	 * @return boolean
	 */
	public function valid( $value ) {
		$this->messages = array();
		$valid = true;
		$rules = array();
		if ( ! empty($value) ) {
			$rules = $this->getValidate();
		} elseif ( $this->required ) {
			$rules = array($this->required);	
		}
		foreach ( $rules as $rule ) {
			try {
				$rule->assert($value);
			} catch ( \Exception $e ) {
				$this->messages[$rule->getIdentify()] = $rule->getMessage();
				$valid = false;
			}
		}
		return $valid;
	}
	
	/**
	 * Afirma se um valor é valido
	 * 
	 * @param mixed $value
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	public function assert($value) {
		if ( ! empty($value) ) {
			$rules = $this->getValidate();
		} elseif ( $this->required ) {
			$rules = array($this->required);
		}
		foreach ( $rules as $rule ) {
			$rule->assert($value);
		}
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