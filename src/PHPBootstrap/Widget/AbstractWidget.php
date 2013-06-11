<?php
namespace PHPBootstrap\Widget;

use PHPBootstrap\Render\RenderKit;

/**
 * Widget Abstrato
 */
abstract class AbstractWidget extends AbstractRender implements Widget {

	/**
	 * Nome
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Pai
	 *
	 * @var Containable
	 */
	protected $parent;

	/**
	 *
	 * @see Widget::getName()
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 *
	 * @see Widget::setName()
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 *
	 * @see Widget::setParent()
	 */
	public function setParent( Containable $parent = null ) {
		$this->parent = $parent;
	}

	/**
	 *
	 * @see Widget::getParent()
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 *
	 * @see Widget::render()
	 */
	public function render() {
		RenderKit::getInstance()->render($this);
	}
	
}
?>