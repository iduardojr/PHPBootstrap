<?php
namespace PHPBootstrap\Widget;

use PHPBootstrap\Common\ArrayCollection;

/**
 * Container abstrato
 */
abstract class AbstractContainer extends AbstractWidget implements \IteratorAggregate, \Countable {

	/**
	 * Filhos
	 *
	 * @var ArrayCollection
	 */
	protected $children;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->children = new ArrayCollection();
	}

	/**
	 * Adiciona um widget no fim
	 *
	 * @param Widget $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function append( Widget $widget ) {
		if ( $this->contains($widget) ) {
			return false;
		}
		$this->_insert($widget);
		$this->children->append($widget);
		return true;
	}

	/**
	 * Adiciona um widget no inicio
	 *
	 * @param Widget $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function prepend( Widget $widget ) {
		if ( $this->contains($widget) ) {
			return false;
		}
		$this->_insert($widget);
		$this->children->prepend($widget);
		return true;
	}

	/**
	 * Verifica se um widget existe
	 *
	 * @param Widget $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function contains( Widget $widget ) {
		return $this->children->contains($widget);
	}

	/**
	 * Insere um widget apos outro
	 *
	 * @param Widget $target
	 * @param Widget $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 * @throws \RuntimeException
	 */
	public function after( Widget $target, Widget $widget ) {
		if ( ! $this->contains($target) || $this->contains($widget) ) {
			return false;
		}
		$index = $this->children->indexOf($target);
		$this->_insert($widget);
		$this->children->after($index, $widget);
		return true;
	}

	/**
	 * Insere um widget antes outro
	 *
	 * @param Widget $target
	 * @param Widget $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function before( Widget $target, Widget $widget ) {
		if ( ! $this->contains($target) || $this->contains($widget) ) {
			return false;
		}
		$this->_insert($widget);
		$index = $this->children->indexOf($target);
		$this->children->before($index, $widget);
		return true;
	}

	/**
	 * Substitui um widget
	 *
	 * @param Widget $target
	 * @param Widget $widget
	 * @throws \InvalidArgumentException
	 */
	public function replace( Widget $target, Widget $widget ) {
		if ( ! $this->contains($target) || $this->contains($widget) ) {
			return false;
		}
		$this->children->replace($target, $widget);
		$this->_remove($target);
		$this->_insert($widget);
		return true;
	}

	/**
	 * Obtem um widget a partir do nome
	 *
	 * @param string $name
	 * @return Widget
	 */
	public function getByName( $name ) {
		foreach ( $this->getIterator() as $widget ) {
			if ( $widget->getName() == $name ) {
				return $widget;
			} else if ( $widget instanceof AbstractContainer ) {
				$widget = $widget->getByName($name);
				if ( $widget ) {
					return $widget;
				}
			}
		}
		return null;
	}

	/**
	 * Remove um widget
	 *
	 * @param Widget $widget
	 * @return boolean
	 * @throws \InvalidArgumentException
	 */
	public function remove( Widget $widget ) {
		$this->_remove($widget);
		return $this->children->remove($widget);
	}

	/**
	 * Remove todos os widget
	 */
	public function removeAll() {
		foreach ( $this->getIterator() as $widget ) {
			$this->remove($widget);
		}
		$this->children->clear();
	}

	/**
	 *
	 * @see IteratorAggregate::getIterator()
	 */
	public function getIterator() {
		return $this->children->getIterator();
	}

	/**
	 *
	 * @see Countable::count()
	 */
	public function count() {
		return $this->children->count();
	}

	/**
	 * Processa um elemento antes de inserir
	 *
	 * @param Widget $widget
	 */
	protected function _insert( Widget $widget ) {
		$widget->setParent($this);
	}

	/**
	 * Processa um elemento antes de remover
	 *
	 * @param Widget $widget
	 */
	protected function _remove( Widget $widget ) {
		$widget->setParent(null);
	}

}
?>