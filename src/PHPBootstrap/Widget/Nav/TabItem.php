<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Common\ArrayIterator;
use PHPBootstrap\Common\ArrayCollection;

/**
 * Item da tab
 */
class TabItem extends NavItem {

	/**
	 * Paineis
	 * 
	 * @var ArrayCollection
	 */
	protected $panes;

	/**
	 * Construtor 
	 * - NavItem.Left 
	 * - NavItem.Right
	 *
	 * @param Element $element
	 * @param string $align
	 * @param array $panes
	 * @throws \UnexpectedValueException
	 */
	public function __construct( Element $element, $align, array $panes = array() ) {
		parent::__construct($element, $align);
		$this->panes = new ArrayCollection($panes);
	}

	/**
	 * Obtem os paineis
	 * 
	 * @return ArrayIterator
	 */
	public function getPanes() {
		return $this->panes->getIterator();
	}

}
?>