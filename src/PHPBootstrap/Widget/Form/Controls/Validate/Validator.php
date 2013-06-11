<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Pattern\Pattern;
use PHPBootstrap\Validate\Required\Requirable;

/**
 * Validador
 */
class Validator {

	/**
	 * Requerido
	 *
	 * @var RuleRequirable
	 */
	protected $required;

	/**
	 * Padrão
	 *
	 * @var RulePattern
	 */
	protected $pattern;

	/**
	 * Tamanho
	 *
	 * @var RuleLength
	 */
	protected $length;

	/**
	 * Mensagens de erro
	 *
	 * @var ArrayCollection
	 */
	protected $messages;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->messages = new ArrayCollection();
	}

	/**
	 * Obtem validador requerido
	 *
	 * @return Requirable
	 */
	public function getRequired() {
		return $this->required->getRule();
	}

	/**
	 * Atribui validador requerido
	 *
	 * @param Requirable $rule
	 * @param string $message
	 */
	public function setRequired( Requirable $rule = null, $message = null) {
		if ( $rule !== null ) {
			$rule = new RuleRequirable($rule, $message);
		}
		$this->required = $rule;
	}

	/**
	 * Obtem validador padrão
	 * 
	 * @return Pattern
	 */
	public function getPattern() {
		return $this->pattern->getRule();
	}

	/**
	 * Atribui validador padrão
	 * 
	 * @param Pattern $rule
	 * @param string $message
	 */
	public function setPattern( Pattern $rule = null, $message = null ) {
		if ( $rule !== null ) {
			$rule = new RulePattern($rule, $message);
		}
		$this->pattern = $rule;
	}

	/**
	 * Obtem validador do tamanho
	 * 
	 * @return Length
	 */
	public function getLength() {
		return $this->length->getRule();
	}

	/**
	 * Atribui validador do tamanho
	 * 
	 * @param Length $rule
	 * @param string $message
	 */
	public function setLength( Length $rule = null, $message = null ) {
		if ( $rule !== null ) {
			$rule = new RuleLength($rule, $message);	
		}
		$this->length = $rule;
	}

	/**
	 * Valida um valor
	 * 
	 * @return boolean
	 */
	public function valid( $value ) {
		$this->messages->clear();
		$valid = true;
		foreach ( $this->getValidate() as $rule ) {
			if ( ! $rule->valid($value) ) {
				$valid = false;
				$this->messages->set($rule->getIdentify(), $rule->getMessage());
			}
		}
		return $valid;
	}

	/**
	 * Obtem as mensagens de erro
	 * 
	 * @return \Iterator
	 */
	public function getMessages() {
		return $this->messages->getIterator();
	}
	
	/**
	 * Obtem o iterador das validações
	 * 
	 * @return Validate
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
		return new Validate($rules);
	}

}
?>