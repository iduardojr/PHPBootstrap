<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Format\NumberVisitor;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Campo de entrada de dinheiro
 */
class MaskMoney extends AbstractRender implements Maskable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.maskmoney';

	/**
	 * Simbolo monetario
	 *
	 * @var string
	 */
	protected $symbol;

	/**
	 * Separador de milhares
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
	 * Precisao
	 *
	 * @var integer
	 */
	protected $precision;

	/**
	 * Exibir zero
	 *
	 * @var boolean
	 */
	protected $defaultZero;

	/**
	 * Permitir negativo
	 *
	 * @var boolean
	 */
	protected $allowNegative;

	/**
	 * Construtor
	 *
	 * @param NumberVisitor $visitor
	 * @param boolean $defaultZero
	 * @param boolean $allowNegative
	 */
	public function __construct( NumberVisitor $visitor, $defaultZero = true, $allowNegative = true ) {
		$this->accept($visitor);
		$this->setDefaultZero($defaultZero);
		$this->setAllowNegative($allowNegative);
	}

	/**
	 * Obtem simbolo monetario
	 *
	 * @return string
	 */
	public function getSymbol() {
		return $this->symbol;
	}

	/**
	 * Atribui simbolo monetario
	 *
	 * @param string $symbol
	 */
	public function setSymbol( $symbol ) {
		$this->symbol = $symbol;
	}

	/**
	 * Atribui separador de milhares
	 *
	 * @param string $thousands
	 */
	public function setThousands( $thousands ) {
		$this->thousands = $thousands;
	}

	/**
	 * Obtem o separador de milhares
	 *
	 * @return string
	 */
	public function getThousands() {
		return $this->thousands;
	}

	/**
	 * Obtem separador decimal
	 *
	 * @return string
	 */
	public function getDecimal() {
		return $this->decimal;
	}

	/**
	 * Atribui separador decimal
	 *
	 * @param string $decimal
	 */
	public function setDecimal( $decimal ) {
		$this->decimal = $decimal;
	}

	/**
	 * Obtem precisão
	 *
	 * @return integer
	 */
	public function getPrecision() {
		return $this->precision;
	}

	/**
	 * Atribui precisão
	 *
	 * @param integer $precision
	 */
	public function setPrecision( $precision ) {
		$this->precision = ( int ) $precision;
	}

	/**
	 * Obtem exibir zero
	 *
	 * @return boolean
	 */
	public function getDefaultZero() {
		return $this->defaultZero;
	}

	/**
	 * Atribui exibir zero
	 *
	 * @param boolean $allowZero
	 */
	public function setDefaultZero( $allowZero ) {
		$this->defaultZero = ( bool ) $allowZero;
	}

	/**
	 * Obtem exibir negativo
	 *
	 * @return boolean
	 */
	public function getAllowNegative() {
		return $this->allowNegative;
	}

	/**
	 * Atribui exibir negativo
	 *
	 * @param boolean $allowNegative
	 */
	public function setAllowNegative( $allowNegative ) {
		$this->allowNegative = ( bool ) $allowNegative;
	}

	/**
	 * Aceita um visitante
	 * 
	 * @param NumberVisitor $object
	 */
	public function accept( NumberVisitor $object ) {
		$object->visit($this);
	}

}
?>