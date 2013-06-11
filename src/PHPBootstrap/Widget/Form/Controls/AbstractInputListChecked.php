<?php
namespace PHPBootstrap\Widget\Form\Controls;

/**
 * Campo de entrada com uma lista de opções selecionaveis
 */
abstract class AbstractInputListChecked extends AbstractInputList {
	
	/**
	 * Em linha
	 *
	 * @var boolean
	 */
	protected $inline;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param boolean $inline
	 */
	public function __construct( $name, $inline ) {
		parent::__construct($name);
		$this->setInline($inline);
	}

	/**
	 * Obtem se é em linha
	 *
	 * @return boolean
	 */
	public function getInline() {
		return $this->inline;
	}

	/**
	 * Atribui em linha
	 *
	 * @param boolean $inline
	 */
	public function setInline( $inline ) {
		$this->inline = ( bool ) $inline;
	}
	
	/**
	 *
	 * @see AbstractInputList::getContextIdentify()
	 */
	public function getContextIdentify( $value = null ) {
		if ( ! empty($value) && $this->options->containsKey($value) ) {
			return parent::getContextIdentify() . ' :checked[value="' . $value . '"]';
		}
		return parent::getContextIdentify() . ' :checked';
	}

}
?>