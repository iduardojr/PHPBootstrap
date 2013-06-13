<?php
namespace PHPBootstrap\Validate\Measure;

use PHPBootstrap\Validate\Measure\Ruler\Ruler;
use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Measurable;

/**
 * Interface de uma validaчуo quanto ao tamanho
 */
abstract class AbstractMeasure extends AbstractValidate implements Measurable {

	/**
	 * Regua
	 *
	 * @var Ruler
	 */
	protected $ruler;

	/**
	 *
	 * @see Validate::getIdentify()
	 */
	public function getIdentify() {
		return parent::getIdentify() . ( isset($this->ruler) ? $this->ruler->getIdentify() : '' );
	}

	/**
	 * Atribui uma regua
	 *
	 * @param Ruler $ruler
	 */
	public function setRuler( Ruler $ruler = null ) {
		$this->ruler = $ruler;
	}

	/**
	 * Obtem a reguar
	 *
	 * @return Ruler
	 */
	public function getRuler() {
		return $this->ruler;
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
		$ruler = $this->ruler ? $this->ruler->getIdentify() . ' ' : '';
		return $ruler . 'range invalid: value "%s" not ';
	}
	
}
?>