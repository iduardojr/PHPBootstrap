<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Tab\TgTab;

/**
 * Conjunto de Tabs
 */
class Tabbable extends AbstractWidget implements Navegable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.tabbable';
	
	// Posiчуo
	const Above = 'tabs-above';
	const Below = 'tabs-below';
	const Left = 'tabs-left';
	const Right = 'tabs-right';

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;
	
	/**
	 * Elemento ativo
	 *
	 * @var array
	 */
	protected $active;
	
	/**
	 * Posiчуo
	 *
	 * @var string
	 */
	protected $placement;
	
	/**
	 * Estilo
	 * 
	 * @var string
	 */
	protected $style;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->items = new ArrayCollection();
		$this->setNotActive();
		$this->setName($name);
		$this->setStyle(null);
	}

	/**
	 * Obtem posicao
	 *
	 * @return string
	 */
	public function getPlacement() {
		return $this->placement;
	}

	/**
	 * Atribui posicao
	 * - Tabbable.Above
	 * - Tabbable.Below
	 * - Tabbable.Left
	 * - Tabbable.Right
	 * 
	 * @param string $placement
	 * @throws \UnexpectedValueException
	 */
	public function setPlacement( $placement ) {
		$this->placement = Enum::ensure($placement, $this, null);
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
	 * - Nav.Tabs
	 * - Nav.Pills
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$this->style = Enum::ensure($style, array(Nav::Tabs, Nav::Pills), Nav::Tabs);
	}

	/**
	 * Adiciona um item:
	 * - NavItem.Left
	 * - NavItem.Right
	 *
	 * @param NavElement $item
	 * @param string $align
	 * @param TabPane $pane
	 * @param TabPane ...
	 * @throws \InvalidArgumentException
	 * @throws \UnexpectedValueException
	 */
	public function addItem( NavElement $item, $align = null, TabPane $pane = null ) {
		$panes = func_get_args();
		array_shift($panes);
		array_shift($panes);
		foreach( $panes as $i => $pane ) {
			if ( ! $pane instanceof TabPane ) {
				throw new \InvalidArgumentException('argument[' . $i . '] not instance of PHPBootstrap\Widget\Nav\TabPane');
			}
			$pane->setParent($this);
		}
		$item->setNavParent($this);
		$this->items->set(spl_object_hash($item), new TabItem($item, $align, $panes));
		if ( count($panes) === 1 && $item instanceof NavLink ) {
			if ( $item->getToggle() === null ) {
				$item->setToggle(new TgTab($pane));
			}
			if ( $this->getActiveItem() === null ) {
				$this->setActive($item, $pane);
			}
		}
	}
	
	/**
	 * Remove um item
	 *
	 * @param NavElement $item
	 */
	public function removeItem( NavElement $item ) {
		$this->items->removeKey(spl_object_hash($item));
		if ( $this->getActiveItem() === $item ) {
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
	 * Obtem Item Ativo
	 * 
	 * @return NavLink
	 */
	public function getActiveItem() {
		return $this->active['item'];
	}
	
	/**
	 * Obtem Painel Ativo
	 *
	 * @return TabPane
	 */
	public function getActivePane() {
		return $this->active['pane'];
	}

	/**
	 * Atribui ativo
	 * 
	 * @param NavLink $item
	 * @param TabPane $pane
	 */
	public function setActive( NavLink $item, TabPane $pane ) {
		$this->active = array('item' => $item, 'pane' => $pane);
	}
	
	/**
	 * Remove o ativo
	 */
	public function setNotActive() {
		$this->active = array('item' => null, 'pane' => null);
	}
	
}
?>