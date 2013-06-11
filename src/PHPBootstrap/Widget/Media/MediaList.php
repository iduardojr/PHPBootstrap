<?php
namespace PHPBootstrap\Widget\Media;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Lista de midias
 */
class MediaList extends AbstractWidget {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.media.list';

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
	 */
	public function __construct( $name ) {
		$this->setName($name);
		$this->items = new ArrayCollection();
	}

	/**
	 * Adiciona uma midia
	 * 
	 * @param Media $item
	 * @return boolean
	 */
	public function addMedia( Media $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}

	/**
	 * Remove uma midia
	 * 
	 * @param Media $item
	 * @return boolean
	 */
	public function removeMedia( Media $item ) {
		return $this->items->remove($item);
	}

	/**
	 * Obtem um iterador para as midias
	 * 
	 * @return \Iterator
	 */
	public function getMedias() {
		return $this->items->getElements();
	}
	
}
?>