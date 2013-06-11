<?php
namespace PHPBootstrap\Common;

use PHPBootstrap\Common\ListCollection;
use PHPBootstrap\Common\MapCollection;
use PHPBootstrap\Common\StackCollection;

/**
 * Coleзгo em array
 */
class ArrayCollection implements ListCollection, MapCollection, StackCollection {

	/**
	 * Elementos
	 *
	 * @var array
	 */
	protected $elements;

	/**
	 * Construtor
	 *
	 * @param array $elements
	 */
	public function __construct( array $elements = array() ) {
		$this->fromArray($elements);
	}

	/**
	 *
	 * @see ListCollection::add()
	 */
	public function add( $element ) {
		$this->append($element);
	}

	/**
	 *
	 * @see ListCollection::contains()
	 */
	public function contains( $element ) {
		return in_array($element, $this->elements, true);
	}

	/**
	 *
	 * @see ListCollection::remove()
	 */
	public function remove( $element ) {
		$key = $this->indexOf($element);
		if ( $key !== null ) {
			unset($this->elements[$key]);
			return true;
		}
		return false;
	}

	/**
	 *
	 * @see ListCollection::getFirst()
	 */
	public function getFirst() {
		return reset($this->elements);
	}

	/**
	 *
	 * @see ListCollection::getLast()
	 */
	public function getLast() {
		return end($this->elements);
	}

	/**
	 *
	 * @see Collection::isEmpty()
	 */
	public function isEmpty() {
		return empty($this->elements);
	}

	/**
	 *
	 * @see Collection::clear()
	 */
	public function clear() {
		$this->elements = array();
	}

	/**
	 *
	 * @see Collection::indexOf()
	 */
	public function indexOf( $element ) {
		return array_search($element, $this->elements, true);
	}

	/**
	 *
	 * @see Collection::get()
	 */
	public function get( $key ) {
		$key = is_object($key) ? (string) $key : $key;
		if ( $this->containsKey($key) ) {
			return $this->elements[$key];
		}
		return null;
	}

	/**
	 *
	 * @see Collection::reverse()
	 */
	public function reverse( $preserveKey = true ) {
		$this->elements = array_reverse($this->elements, ( bool ) $preserveKey);
	}

	/**
	 *
	 * @see Collection::toArray()
	 */
	public function toArray() {
		return $this->elements;
	}

	/**
	 *
	 * @see Collection::fromArray()
	 */
	public function fromArray( array $elements ) {
		$this->elements = $elements;
	}

	/**
	 *
	 * @see IteratorAggregate::getIterator()
	 */
	public function getIterator() {
		return new ArrayIterator($this->toArray());
	}

	/**
	 *
	 * @see Countable::count()
	 */
	public function count() {
		return count($this->elements);
	}

	/**
	 *
	 * @see MapCollection::set()
	 */
	public function set( $key, $element ) {
		if ( $element === null ) {
			$this->removeKey($key);
		} else {
			$this->elements[( string ) $key] = $element;
		}
	}

	/**
	 *
	 * @see MapCollection::containsKey()
	 */
	public function containsKey( $key ) {
		$key = is_object($key) ? (string) $key : $key;
		return isset($this->elements[$key]);
	}

	/**
	 *
	 * @see MapCollection::removeKey()
	 */
	public function removeKey( $key ) {
		$key = is_object($key) ? (string) $key : $key;
		$removed = $this->get($key);
		unset($this->elements[$key]);
		return $removed;
	}

	/**
	 *
	 * @see MapCollection::getKeys()
	 */
	public function getKeys() {
		return new ArrayIterator(array_keys($this->elements));
	}

	/**
	 *
	 * @see MapCollection::getElements()
	 */
	public function getElements() {
		return new ArrayIterator(array_values($this->elements));
	}

	/**
	 *
	 * @see MapCollection::getFirstKey()
	 */
	public function getFirstKey() {
		$this->getFirst();
		return key($this->elements);
	}

	/**
	 *
	 * @see MapCollection::getLastKey()
	 */
	public function getLastKey() {
		$this->getLast();
		return key($this->elements);
	}

	/**
	 *
	 * @see StackCollection::append()
	 */
	public function append( $element ) {
		array_push($this->elements, $element);
	}

	/**
	 *
	 * @see StackCollection::prepend()
	 */
	public function prepend( $element ) {
		array_unshift($this->elements, $element);
	}

	/**
	 *
	 * @see StackCollection::replace()
	 */
	public function replace( $elementOld, $elementNew ) {
		$key = $this->indexOf($elementOld);
		if ( $key !== null ) {
			$this->set($key, $elementNew);
			return true;
		}
		return false;
	}

	/**
	 *
	 * @see StackCollection::after()
	 */
	public function after( $keySearch, $element, $key = null ) {
		$partition = false;
		$key = is_object($key) ? (string) $key : $key;
		$keySearch = is_object($keySearch) ? (string) $keySearch : $keySearch;
		$element = $key === null ? array( $element ) : array( $key => $element );
		$p = $this->partition(function ( $key, $element ) use( $keySearch, &$partition ) {
			if ( $key === $keySearch ) {
				$partition = true;
				return true;
			}
			return ! $partition;
		});
		$this->elements = array_merge_recursive($p[0]->toArray(), $element, $p[1]->toArray());
	}

	/**
	 *
	 * @see StackCollection::before()
	 */
	public function before( $keySearch, $element, $key = null ) {
		$partition = false;
		$key = is_object($key) ? (string) $key : $key;
		$keySearch = is_object($keySearch) ? (string) $keySearch : $keySearch;
		$element = $key === null ? array( $element ) : array( $key => $element );
		$p = $this->partition(function ( $key, $element ) use( $keySearch, &$partition ) {
			if ( $key === $keySearch ) {
				$partition = true;
			}
			return ! $partition;
		});
		$this->elements = array_merge_recursive($p[0]->toArray(), $element, $p[1]->toArray());
	}

	/**
	 *
	 * @see StackCollection::pop()
	 */
	public function pop() {
		return array_pop($this->elements);
	}

	/**
	 *
	 * @see StackCollection::shift()
	 */
	public function shift() {
		return array_shift($this->elements);
	}

	/**
	 *
	 * @see StackCollection::resetKeys()
	 */
	public function resetKeys() {
		$this->elements = array_merge($this->elements);
	}

	/**
	 *
	 * @see Collection::partition()
	 */
	public function partition( \Closure $callback ) {
		$coll1 = $coll2 = array();
		foreach ( $this->elements as $key => $element ) {
			if ( $callback($key, $element) ) {
				$coll1[$key] = $element;
			} else {
				$coll2[$key] = $element;
			}
		}
		return array( new ArrayCollection($coll1), new ArrayCollection($coll2) );
	}

}
?>