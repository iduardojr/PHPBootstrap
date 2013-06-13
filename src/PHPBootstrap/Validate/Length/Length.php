<?php
namespace PHPBootstrap\Validate\Length;

use PHPBootstrap\Validate\Validate;
use PHPBootstrap\Validate\Length\Counter\Counter;

/**
 * Interface de uma validaчуo quanto ao tamanho
 */
abstract class Length extends Validate {

	/**
	 * Contador
	 *
	 * @var Counter
	 */
	protected $counter;

	/**
	 *
	 * @see Validate::getIdentify()
	 */
	public function getIdentify() {
		return parent::getIdentify() . ( isset($this->counter) ? $this->counter->getIdentify() : '' );
	}

	/**
	 * Atribui um contador
	 *
	 * @param Counter $counter
	 * @throws \RuntimeException
	 */
	public function setCounter( Counter $counter = null ) {
		$this->counter = $counter;
	}

	/**
	 * Obtem o contador
	 *
	 * @return Counter
	 */
	public function getCounter() {
		return $this->counter;
	}

	/**
	 * Verifica se um valor щ numerico
	 *
	 * @param mixed $value
	 * @return boolean
	 */
	protected function isNumeric( $value ) {
		return ( is_float($value) || is_integer($value) );
	}

	/**
	 *
	 * @see Validate::getDefaultMessage()
	 */
	protected function getDefaultMessage() {
		$counter = $this->counter ? $this->counter->getIdentify() . ' ' : '';
		return $counter . 'range invalid: value "%s" not ';
	}
	
}
?>