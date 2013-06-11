<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\ArrayCollection;

use PHPBootstrap\Widget\Action\TgLink;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Migalhas de pão
 */
class Breadcrumb extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.breadcrumb';

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Divisor
	 *
	 * @var string
	 */
	protected $divider;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param string $divider
	 */
	public function __construct( $name, $divider = '/' ) {
		$this->items = new ArrayCollection();
		$this->setName($name);
		$this->setDivider($divider);
	}

	/**
	 * Adiciona um item
	 *
	 * @param string $text
	 * @param TgLink $toggle
	 */
	public function addItem( $text, TgLink $toggle = null ) {
		if ( $toggle ) {
			$this->items->set($text, array( 'text' => $text, 'toggle' => $toggle ));
		} else {
			$this->items->set($text, $text);
		}
	}

	/**
	 * Remove um item
	 * 
	 * @param string $text
	 */
	public function removeItem( $text ) {
		$this->items->removeKey($text);
	}

	/**
	 * Obtem um iterator para os itens
	 *
	 * @return \Iterator
	 */
	public function getItems() {
		return $this->items->getElements();
	}

	/**
	 * Obtem divisor
	 *
	 * @return string
	 */
	public function getDivider() {
		return $this->divider;
	}

	/**
	 * Atribui divisor
	 *
	 * @param string $divider
	 */
	public function setDivider( $divider ) {
		$this->divider = $divider;
	}

}
?>