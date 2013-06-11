<?php
namespace PHPBootstrap\Widget\Carousel;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Slide\Slide;

/**
 * Carousel
 */
class Carousel extends AbstractWidget implements Slide {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.carousel';

	/**
	 * Gera identificaчуo unica
	 *
	 * @var integer
	 */
	protected static $guid = 1;

	/**
	 * Identificaчуo da instancia
	 *
	 * @var integer
	 */
	protected $identity;

	/**
	 * Exibir indicadores
	 *
	 * @var boolean
	 */
	protected $indicators;

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Pausa
	 *
	 * @var boolean
	 */
	protected $pause = true;

	/**
	 * Intervalo
	 *
	 * @var integer
	 */
	protected $interval;

	/**
	 * Exibir anterior
	 *
	 * @var boolean
	 */
	protected $prev;

	/**
	 * Exibir posterior
	 *
	 * @var boolean
	 */
	protected $next;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->items = new ArrayCollection();
		$this->identity = self::$guid++;
		$this->setPrev(true);
		$this->setNext(true);
		$this->setIndicators(true);
		$this->setName($name);
	}

	/**
	 * Adiciona um item
	 *
	 * @param CarouselItem $item
	 */
	public function addItem( CarouselItem $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}

	/**
	 * Remove um item
	 *
	 * @param CarouselItem $item
	 */
	public function removeItem( CarouselItem $item ) {
		return $this->items->remove($item);
	}

	/**
	 * Obtem um iterador para os items
	 *
	 * @return \Iterator
	 */
	public function getItems() {
		return $this->items->getElements();
	}

	/**
	 * Atribui um item ativo
	 *
	 * @param CarouselItem $item
	 * @throws \RuntimeException
	 */
	public function setActive( CarouselItem $item = null ) {
		if ( ! $this->items->contains($item) ) {
			throw new \RuntimeException('item not contains in items of Carousel');
		}
		$this->active = $item;
	}

	/**
	 * Obtem o item ativo
	 * 
	 * @return CarouselItem
	 */
	public function getActive() {
		return isset($this->active) ? $this->active : $this->items->getFirst();
	}

	/**
	 * Obtem pause
	 *
	 * @return boolean
	 */
	public function getPause() {
		return $this->pause;
	}

	/**
	 * Atribui pause
	 *
	 * @param boolean $pause
	 */
	public function setPause( $pause ) {
		$this->pause = ( bool ) $pause;
	}

	/**
	 * Obtem intervalo
	 *
	 * @return integer
	 */
	public function getInterval() {
		return $this->interval;
	}

	/**
	 * Atribui intervalo
	 *
	 * @param integer $interval
	 */
	public function setInterval( $interval ) {
		$this->interval = ( int ) $interval > 0 ? $interval : 0;
	}

	/**
	 * Exibe anterior
	 *
	 * @return boolean
	 */
	public function getPrev() {
		return $this->prev;
	}

	/**
	 * Atribui anterior
	 *
	 * @param boolean $prev
	 */
	public function setPrev( $prev ) {
		$this->prev = ( bool ) $prev;
	}

	/**
	 * Exibe proximo
	 *
	 * @return boolean
	 */
	public function getNext() {
		return $this->next;
	}

	/**
	 * Atribui proximo
	 *
	 * @param boolean $next
	 */
	public function setNext( $next ) {
		$this->next = ( bool ) $next;
	}

	/**
	 * Obtem exibiчуo de indicadores
	 *
	 * @return boolean
	 */
	public function getIndicators() {
		return $this->indicators;
	}

	/**
	 * Atribui exibiчуo de indicadores
	 *
	 * @param boolean $indicators
	 */
	public function setIndicators( $indicators ) {
		$this->indicators = ( bool ) $indicators;
	}

	/**
	 *
	 * @see Slide::getIdentify()
	 */
	public function getIdentify() {
		return $this->getName() ? $this->getName() : 'slide-' . str_repeat('0', 3 - strlen($this->identity)) . $this->identity;
	}

}
?>