<?php
namespace PHPBootstrap\Widget\Thumbnail;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Common\ArrayCollection;

/**
 * Lista de miniaturas
 */
class ThumbnailList extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.thumbnail.list';

	/**
	 * Tamanho das miniaturas
	 *
	 * @var integer
	 */
	protected $span;

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param integer $span
	 */
	public function __construct( $name, $span ) {
		$this->setName($name);
		$this->setSpan($span);
		$this->items = new ArrayCollection();
	}

	/**
	 * Adiciona uma Thumbnail
	 *
	 * @param Thumbnail $item
	 * @return boolean
	 */
	public function addThumbnail( Thumbnail $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}

	/**
	 * Remove uma Thumbnail
	 *
	 * @param Thumbnail $item
	 * @return boolean
	 */
	public function removeThumbnail( Thumbnail $item ) {
		return $this->items->remove($item);
	}

	/**
	 * Obtem um iterador para as Thumbnails
	 *
	 * @return \Iterator
	 */
	public function getThumbnails() {
		return $this->items->getElements();
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
		$this->span = ( int ) ( $span > 12 ? 12 : ( $span < 0 ? 1 : $span ) );
	}

}
?>