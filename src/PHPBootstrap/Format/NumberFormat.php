<?php
namespace PHPBootstrap\Format;

use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;

/**
 * Formatação de numero
 */
class NumberFormat implements Formatter, NumberVisitor {

	/**
	 * Separador de milhar
	 *
	 * @var string
	 */
	protected $thousands;

	/**
	 * Separador decimal
	 *
	 * @var string
	 */
	protected $decimal;

	/**
	 * Precisão
	 *
	 * @var integer
	 */
	protected $precision;

	/**
	 * Construtor
	 *
	 * @param integer $precision
	 * @param string $decimal
	 * @param string $thousands
	 * @throws \InvalidArgumentException
	 */
	public function __construct( $precision, $decimal, $thousands ) {
		if ( $precision > 0 && ( empty($decimal) || $thousands == $decimal ) ) {
			throw new \InvalidArgumentException('decimal invalid');
		}
		$this->thousands = $thousands;
		$this->decimal = $decimal;
		$this->precision = ( int ) $precision > 0 ? $precision : 0;
	}

	/**
	 *
	 * @see Formatter::regex()
	 */
	public function regex() {
		$pattern = '/^-?(\d+';
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
		if ( ! is_numeric($value) ) {
			throw new \InvalidArgumentException('value not is numeric');
		}
		return number_format($value, $this->precision, $this->decimal, $this->thousands);
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
			return 0;
		}
		if ( preg_match($this->regex(), $value) <= 0 ) {
			$pattern = '#' . $this->thousands . '###';
			$pattern .= $this->precision > 0 ? ( $this->decimal . str_repeat('#', $this->precision) ) : '';
			throw new \InvalidArgumentException('value not is format: ' . $pattern);
		}
		$value = str_replace(array( $this->thousands, $this->decimal ), array( '', '.' ), $value);
		return round($value, $this->precision);
	}

	/**
	 * 
	 * @see NumberVisitor::visit()
	 */
	public function visit( MaskMoney $object ) {
		$object->setSymbol(null);
		$object->setPrecision($this->precision);
		$object->setDecimal($this->decimal);
		$object->setThousands($this->thousands);
	}

}
?>