<?php
namespace PHPBootstrap\Common;

/**
 * Interador de array
 */
class ArrayIterator implements \Iterator {

	/**
	 * Elementos
	 *
	 * @var array
	 */
	protected $elements;

	/**
	 * Elemento corrente
	 *
	 * @var array
	 */
	protected $current;
	
	/**
	 * Primeiro elemento
	 * @var boolean
	 */
	protected $first;

	/**
	 * Construtor
	 *
	 * @param array $elements
	 */
	public function __construct( array $elements = array() ) {
		$this->elements = $elements;
	}

	/**
	 *
	 * @see Iterator::current()
	 */
	public function current() {
		return $this->current['value'];
	}

	/**
	 *
	 * @see Iterator::next()
	 */
	public function next() {
		$this->current = each($this->elements);
		return $this->valid();
	}

	/**
	 *
	 * @see Iterator::key()
	 */
	public function key() {
		return $this->current['key'];
	}

	/**
	 *
	 * @see Iterator::valid()
	 */
	public function valid() {
		return ! $this->current === false;
	}

	/**
	 *
	 * @see Iterator::rewind()
	 */
	public function rewind() {
		reset($this->elements);
		$this->current = each($this->elements);
	}

}
?>