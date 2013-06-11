<?php
namespace PHPBootstrap\Format;

use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;

/**
 * Formato de numero monetario
 */
class MoneyFormat extends NumberFormat {

	/**
	 * Simbolo
	 *
	 * @var string
	 */
	protected $symbol;

	/**
	 * Construtor
	 * 
	 * @param integer $precision
	 * @param string $decimal
	 * @param string $thousands
	 * @param string $symbol
	 */
	public function __construct( $precision, $decimal, $thousands, $symbol ) {
		parent::__construct($precision, $decimal, $thousands);
		$this->symbol = $symbol;
	}

	/**
	 *
	 * @see Formatter::regex()
	 */
	public function regex() {
		$pattern = '/^(' . $this->symbol . '\s)?-?(\d+';
		if ( $this->thousands ) {
			$pattern .= '|([1-9]\d{0,2}(\\' . $this->thousands . '\d{3})+)';
		}
		$pattern .= ')';
		if ( $this->precision ) {
			$pattern .= '(\\' . $this->decimal . '\d{0,' . $this->precision . '})?';
		}
		$pattern .= '$/';
		return $pattern;
	}

	/**
	 * Formata o numero
	 *
	 * @param number $value
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function format( $value ) {
		if ( $value === null || $value === '' ) {
			return null;
		}
		return $this->symbol . ' ' . parent::format($value);
	}

	/**
	 * Converte em numero
	 *
	 * @param string $value
	 * @return number
	 * @throws \InvalidArgumentException
	 */
	public function parse( $value ) {
		if ( $value === null || $value === '' ) {
			return null;
		}
		if ( preg_match($this->regex(), $value) <= 0 ) {
			$pattern = $this->symbol . ' #' . $this->thousands . '###';
			$pattern .= $this->precision > 0 ? ( $this->decimal . str_repeat('#', $this->precision) ) : '';
			throw new \InvalidArgumentException('value not is format: ' . $pattern);
		}
		$value = str_replace(array( $this->symbol, $this->thousands, $this->decimal ), array('', '', '.' ), $value);
		return round($value, $this->precision);
	}
	
	/**
	 * 
	 * @see NumberFormat::visit()
	 */
	public function visit(MaskMoney $object) {
		parent::visit($object);
		$object->setSymbol($this->symbol);
	}

}
?>