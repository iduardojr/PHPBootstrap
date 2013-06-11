<?php
namespace PHPBootstrap\Widget\Datepicker;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Containable;
use PHPBootstrap\Render\RenderKit;

/**
 * DatePicker
 */
class DatePicker extends AbstractDatePicker implements Widget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.datepicker';

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
	 * Valor padrao
	 *
	 * @var string
	 */
	protected $defaultValue;

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
	 * @see Widget::getParent()
	 */
	public function getParent() {
		return $this->parent;
	}
	
	/**
	 *
	 * @see Widget::setParent()
	 */
	public function setParent( Containable $parent = null ) {
		$this->parent = $parent;
	}
	
	/**
	 * Obtem o valor padrão
	 *
	 * @return string
	 */
	public function getDefaultValue() {
		return $this->defaultValue;
	}
	
	/**
	 * Atribui um valor padrão
	 * 
	 * @param mixed $defaultValue
	 * @throws \InvalidArgumentException
	 */
	public function setDefaultValue( $defaultValue ) {
		if ( preg_match($this->format->regex(), $defaultValue) <= 0 ) {
			$defaultValue = $this->format->format($defaultValue);
		}
		$this->defaultValue = $defaultValue;
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