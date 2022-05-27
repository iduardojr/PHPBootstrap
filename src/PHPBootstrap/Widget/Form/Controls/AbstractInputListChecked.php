<?php
namespace PHPBootstrap\Widget\Form\Controls;

/**
 * Campo de entrada com uma lista de op��es selecionaveis
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
	 * Obtem se � em linha
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
	
}
?>