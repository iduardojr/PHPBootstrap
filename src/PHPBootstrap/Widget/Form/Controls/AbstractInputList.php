<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Common\ArrayCollection;

/**
 * Campo de entrada com uma lista de opчѕes
 */
abstract class AbstractInputList extends AbstractInputSpan implements InputQuery {

	/**
	 * Opчѕes
	 *
	 * @var ArrayCollection
	 */
	protected $options;

	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		parent::__construct($name);
		$this->options = new ArrayCollection();
	}
	
	/**
	 *
	 * @see AbstractInput::getValue()
	 */
	public function getValue() {
		if ( $this->options->containsKey($this->value) ) {
			return $this->value;
		}
		return null;
	}

	/**
	 * Adiciona uma opчуo
	 *
	 * @param scalar $value
	 * @param scalar $label
	 */
	public function addOption( $value, $label ) {
		$this->options->set($value, $label);
	}

	/**
	 * Remove uma opчуo
	 * 
	 * @param scalar $value
	 */
	public function removeOption( $value ) {
		$this->options->removeKey($value);
	}

	/**
	 * Obtem as opчѕes
	 *
	 * @return \Iterator
	 */
	public function getOptions() {
		return $this->options->getIterator();
	}
	
	/**
	 * 
	 * @see AbstractInput::getContextIdentify()
	 */
	public function getContextIdentify( $value = null ) {
		return parent::getContextIdentify();
	}

}
?>