<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Form\Inputable;
use PHPBootstrap\Widget\Form\Form;

/**
 * Campo de saida
 */
class Output extends AbstractWidget implements Inputable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.output';

	/**
	 * Transforma o dado
	 *
	 * @var callback
	 */
	protected $transform;

	/**
	 * Valor
	 *
	 * @var mixed
	 */
	protected $value;

	/**
	 * Tamanho
	 *
	 * @var string
	 */
	protected $span;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->setName($name);
	}

	/**
	 *
	 * @see Inputable::prepare()
	 */
	public function prepare( Form $form ) {
	}

	/**
	 *
	 * @see Inputable::setValue()
	 */
	public function setValue( $value ) {
		if ( ! ( is_scalar($value) || is_null($value) ) ) {
			throw new \InvalidArgumentException('value is not scalar');
		}
		$this->value = $value;
	}

	/**
	 *
	 * @see Inputable::getValue()
	 */
	public function getValue() {
		if ( isset($this->transform) ) {
			return call_user_func($this->transform, $this->value);
		}
		return $this->value;
	}

	/**
	 * Atribui o tamanho do input com valores entre 1 e 12
	 *
	 * @param integer $span
	 * @throws \InvalidArgumentException
	 */
	public function setSpan( $span ) {
		if ( $span < 0 || $span > 12 ) {
			throw new \InvalidArgumentException('span not is between 1 and 12');
		}
		$this->span = ( int ) $span;
	}

	/**
	 * Obtem o tamanho do input
	 *
	 * @return integer
	 */
	public function getSpan() {
		return $this->span;
	}

	/**
	 * Atribui um transformador de saida do dado
	 *
	 * @param callback $transform
	 * @throws \InvalidArgumentException
	 */
	public function setTransform( $transform ) {
		if ( ! is_callable($transform) ) {
			throw new \InvalidArgumentException('transform not is callable');
		}
		$this->transform = $transform;
	}

	/**
	 *
	 * @see Inputable::valid()
	 */
	public function valid() {
		return true;
	}

	/**
	 *
	 * @see Inputable::getFailMessages()
	 */
	public function getFailMessages() {
		return new ArrayIterator(array());
	}

}
?>