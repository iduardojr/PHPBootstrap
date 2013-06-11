<?php
namespace PHPBootstrap\Widget\Form\Controls;

/**
 * Campo de entrada abstrato com tamanho
 */
abstract class AbstractInputSpan extends AbstractInput {

	/**
	 * Tamanho
	 *
	 * @var integer
	 */
	protected $span;

	/**
	 * Atribui o tamanho do input com valores entre 1 e 12
	 *
	 * @param integer $span
	 * @throws \InvalidArgumentException
	 */
	public function setSpan( $span ) {
		if ( $span < 0 || $span > 12 ) {
			throw new \InvalidArgumentException('span not is between 0 and 12');
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

}
?>