<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Common\ArrayCollection;

/**
 * Navegaчуo
 */
class Nav extends AbstractWidget implements NavbarElement, Navegable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav';
	
	// Estilo
	const Lists = 'nav-list';
	const Tabs = 'nav-tabs';
	const Pills = 'nav-pills';
	const StackedTabs = 'nav-tabs nav-stacked';
	const StackedPills = 'nav-pills nav-stacked';

	/**
	 * Estilo
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Item Ativo
	 *
	 * @var NavLink
	 */
	protected $active;

	/**
	 * Items
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor 
	 * - Nav.Lists 
	 * - Nav.Tabs 
	 * - Nav.Pills 
	 * - Nav.StackedTabs 
	 * - Nav.StackedPills
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function __construct( $style = null ) {
		$this->items = new ArrayCollection();
		$this->setStyle($style);
	}

	/**
	 * Adiciona um item e o alinha: 
	 * - NavItem.Left 
	 * - NavItem.Right
	 *
	 * @param NavElement $item
	 * @param string $align
	 */
	public function addItem( NavElement $item, $align = null ) {
		$item->setNavParent($this);
		$this->items->set(spl_object_hash($item), new NavItem($item, $align));
	}

	/**
	 * Remove um item
	 *
	 * @param NavElement $item
	 */
	public function removeItem( NavElement $item ) {
		$this->items->removeKey(spl_object_hash($item));
		if ( $this->active === $item ) {
			$this->setActive(null);
		}
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
	 * Obtem estilo
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * Atribui estilo: 
	 * - Nav.Lists 
	 * - Nav.Tabs 
	 * - Nav.Pills 
	 * - Nav.StackedTabs 
	 * - Nav.StackedPills
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$this->style = Enum::ensure($style, $this, null);
	}

	/**
	 * Obtem item ativo
	 *
	 * @return NavLink
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * Atribui item Ativo
	 *
	 * @param NavLink $active
	 */
	public function setActive( NavLink $active = null ) {
		$this->active = $active;
	}

	/**
	 *
	 * @see Element::setNavParent()
	 */
	public function setNavParent( Navegable $parent = null ) {
		$this->setParent($parent);
	}

	/**
	 *
	 * @see Element::getNavParent()
	 */
	public function getNavParent() {
		return $this->getParent() instanceof Navegable ? $this->getParent() : null;
	}

}
?>