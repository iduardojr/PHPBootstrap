<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Barra de Navega��o
 */
class Navbar extends AbstractWidget implements Navegable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.navbar';
	
	// Posi��o
	const StaticTop = 'navbar-static-top';
	const FixedTop = 'navbar-fixed-top';
	const FixedBottom = 'navbar-fixed-bottom';

	/**
	 * Exibi��o da barra
	 *
	 * @var string
	 */
	protected $display;

	/**
	 * Inverter
	 *
	 * @var boolean
	 */
	protected $inverse;
	
	/**
	 * Items
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param NavBrand $brand
	 * @param boolean $inverse
	 */
	public function __construct( $name, NavBrand $brand = null, $inverse = false ) {
		$this->items = new ArrayCollection();
		$this->setName($name);
		$this->setInverse($inverse);
		if ( $brand ) {
			$this->addItem($brand, NavItem::Left);
		}
	}

	/**
	 * Adiciona um item e o alinha:
	 * - NavItem.Left
	 * - NavItem.Right
	 * 
	 * @param NavbarElement $item
	 * @param string $align
	 */
	public function addItem( NavbarElement $item, $align = null ) {
		$item->setNavParent($this);
		$this->items->set(spl_object_hash($item), new NavItem($item, $align));
	}
	
	/**
	 * Remove um item
	 *
	 * @param NavbarElement $item
	 */
	public function removeItem( NavbarElement $item ) {
		$this->items->removeKey(spl_object_hash($item));
	}
	
	/**
	 * Obtem itens
	 *
	 * @return \Iterator
	 */
	public function getItems() {
		return $this->items->getElements();
	}

	/**
	 * Atribui exibi��o da barra:
	 * - Navbar.FixedTop
	 * - Navbar.FixedBottom
	 * - Navbar.StaticTop
	 *
	 * @param string $display
	 */
	public function setDisplay( $display ) {
		$this->display = Enum::ensure($display, $this, null);
	}

	/**
	 * Obtem exibi��o da barra
	 *
	 * @return string
	 */
	public function getDisplay() {
		return $this->display;
	}

	/**
	 * Obtem invers�o
	 *
	 * @return boolean
	 */
	public function getInverse() {
		return $this->inverse;
	}

	/**
	 * Atribui invers�o
	 *
	 * @param boolean $inverse
	 */
	public function setInverse( $inverse ) {
		$this->inverse = ( bool ) $inverse;
	}

}
?>