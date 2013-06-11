<?php
namespace PHPBootstrap\Widget;

use PHPBootstrap\Render\RenderKit;

/**
 * Componente
 */
abstract class AbstractComponent extends AbstractRender implements Component {

	/**
	 *
	 * @see Widget::getName()
	 */
	public function getName() {
		return $this->getComponent()->getName();
	}

	/**
	 *
	 * @see Widget::setName()
	 */
	public function setName( $name ) {
		$this->getComponent()->setName($name);
	}

	/**
	 * 
	 * @see Widget::getParent()
	 */
	public function getParent() {
		return $this->getComponent()->getParent();
	}

	/**
	 *
	 * @see Widget::setParent()
	 */
	public function setParent( Containable $parent = null ) {
		$this->getComponent()->setParent($parent);
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