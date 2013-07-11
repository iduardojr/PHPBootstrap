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
	 * @param Widget|array $contents
	 */
	public function __construct( $span = 0, $contents = null ) {
		parent::__construct();
		if ( ! is_array($span) ) {
			$span = array('span' => $span);
		}
		$this->setSpan(isset($span['span']) ? $span['span'] : 0);
		$this->setOffset(isset($span['offset']) ? $span['offset'] : 0);
		if ( $contents !== null ) {
			if ( !is_array($contents) ){
				$contents = array($contents);
			}
			foreach( $contents as $content ) {
				$this->append($content);
			}
		}
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