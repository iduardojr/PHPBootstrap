<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\ArrayCollection;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Descriчуo
 */
class Descriptions extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.descriptions';

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Layout Horizontal
	 *
	 * @var boolean
	 */
	protected $horizontal;
	
	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param boolean $horizontal
	 */
	public function __construct( $name, $horizontal = false ) {
		$this->setName($name);
		$this->setHorizontal($horizontal);
		$this->items = new ArrayCollection();
	}

	/**
	 * Adiciona um termo
	 *
	 * @param string $term
	 * @param string $description
	 */
	public function addTerm( $term, $description ) {
		$this->items->set($term, $description);
	}
	
	/**
	 * Remove um termo
	 *
	 * @param string $term
	 */
	public function removeTerm( $term ) {
		$this->items->removeKey($term);
	}

	/**
	 * Obtem um iterador de termos
	 *
	 * @return \Iterator
	 */
	public function getTerms() {
		return $this->items->getIterator();
	}

	/**
	 * Obtem layout horizontal
	 * 
	 * @return boolean
	 */
	public function getHorizontal() {
		return $this->horizontal;
	}

	/**
	 * Atribui layout horizontal
	 * 
	 * @param boolean $horizontal
	 */
	public function setHorizontal( $horizontal ) {
		$this->horizontal = (bool) $horizontal;
	}

}
?>