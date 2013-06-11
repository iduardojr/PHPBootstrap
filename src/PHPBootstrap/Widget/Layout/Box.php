<?php
namespace PHPBootstrap\Widget\Layout;

use PHPBootstrap\Widget\AbstractContainer;

/**
 * Caixa
 */
class Box extends AbstractContainer {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.layout.box';

	/**
	 * Tamanho
	 *
	 * @var integer
	 */
	protected $span;

	/**
	 * Compensamento
	 *
	 * @var integer
	 */
	protected $offset;

	/**
	 * Construtor
	 *
	 * @param integer $span
	 */
	public function __construct( $span = 0 ) {
		parent::__construct();
		$this->setSpan($span);
	}

	/**
	 * Obtem tamanho
	 *
	 * @return integer
	 */
	public function getSpan() {
		return $this->span;
	}

	/**
	 * Atribui tamanho
	 *
	 * @param integer $span
	 */
	public function setSpan( $span ) {
		$this->span = ( int ) $span > 12 ? 12 : $span;
	}

	/**
	 * Obtem Compensamento
	 *
	 * @return number
	 */
	public function getOffset() {
		return $this->offset;
	}

	/**
	 * Atribui Compensamento
	 *
	 * @param number $offset
	 */
	public function setOffset( $offset ) {
		$this->offset = ( int ) $offset > 12 ? 12 : $offset;
	}

}
?>