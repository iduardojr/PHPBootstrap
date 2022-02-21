<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Common\ArrayCollection;

/**
 * Campo de entrada com uma lista de op��es
 */
abstract class AbstractInputList extends AbstractInputSpan implements InputQuery {

	/**
	 * Op��es
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
	 * Adiciona uma op��o
	 *
	 * @param scalar $value
	 * @param scalar $label
	 */
	public function addOption( $value, $label ) {
		$this->options->set($value, $label);
	}
	
	/**
	 * Atribui options
	 *
	 * @param array|\Traversable $options
	 * @throws \InvalidArgumentException
	 */
	public function setOptions( $options ) {
		if ( ! ( is_array($options) || $options instanceof \Traversable ) ) {
			throw new \InvalidArgumentException('options not is instance of Traversable or type array');
		}
		$this->options->clear();
		foreach( $options as $value => $label ) {
			$this->addOption($value, $label);
		}
	}

	/**
	 * Remove uma op��o
	 * 
	 * @param scalar $value
	 */
	public function removeOption( $value ) {
		$this->options->removeKey($value);
	}

	/**
	 * Obtem as op��es
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