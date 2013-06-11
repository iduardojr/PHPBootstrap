<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Form\Form;
use PHPBootstrap\Widget\Form\TextEditable;

/**
 * Decorator de campos de entrada
 */
class Embed extends AbstractWidget implements TextEditable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.embed';

	/**
	 * Campo
	 *
	 * @var InputInline
	 */
	protected $input;

	/**
	 * Itens
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 *
	 * @param InputInline $input
	 */
	public function __construct( InputInline $input ) {
		$this->items = new ArrayCollection();
		$this->setInput($input);
	}
	
	/**
	 *
	 * @see Inputable::prepare()
	 */
	public function prepare( Form $form ) {
		$this->input->prepare($form);
	}

	/**
	 *
	 * @see Inputable::setValue()
	 */
	public function setValue( $value ) {
		$this->input->setValue($value);
	}

	/**
	 *
	 * @see Inputable::getValue()
	 */
	public function getValue() {
		return $this->input->getValue();
	}
	
	/**
	 *
	 * @see TextEditable::setText()
	 */
	public function setText( $text ) {
		$this->input->setText($text);
	}
	
	/**
	 *
	 * @see TextEditable::getText()
	 */
	public function getText() {
		return $this->input->getText();
	}
	
	/**
	 *
	 * @see Inputable::valid()
	 */
	public function valid() {
		return $this->input->valid();
	}

	/**
	 *
	 * @see Inputable::getFailMessages()
	 */
	public function getFailMessages() {
		return $this->input->getFailMessages();
	}

	/**
	 * Atribui campo de entrada
	 *
	 * @param InputInline $input
	 */
	public function setInput( InputInline $input ) {
		$input->setParent($this);
		$this->items->replace($this->input, $input);
		$this->input = $input;
	}

	/**
	 * Obtem campo de entrada
	 *
	 * @return InputInline
	 */
	public function getInput() {
		return $this->input;
	}

	/**
	 * Verifica se temos elementos antes do input
	 *
	 * @return boolean
	 */
	public function isPrepend() {
		return $this->items->getFirst() !== $this->input;
	}

	/**
	 * Verifica se temos elementos depois do input
	 *
	 * @return boolean
	 */
	public function isAppend() {
		return $this->items->getLast() !== $this->input;
	}

	/**
	 * Adiciona elemento antes
	 *
	 * @param Embeddable $element
	 */
	public function prepend( Embeddable $element ) {
		if ( $this->items->contains($element) ) {
			return false;
		}
		$this->items->prepend($element);
		return true;
	}

	/**
	 * Adiciona elemento depois
	 *
	 * @param Embeddable $element
	 */
	public function append( Embeddable $element ) {
		if ( $this->items->contains($element) ) {
			return false;
		}
		$this->items->append($element);
		return true;
	}

	/**
	 * Remove um elemento
	 *
	 * @param Embeddable $element
	 * @return boolean
	 */
	public function remove( Embeddable $element ) {
		if ( $this->input === $element ) {
			return false;
		}
		return $this->items->remove($element);
	}

	/**
	 * Obtem uma lista de itens
	 *
	 * @return \Iterator
	 */
	public function getItems() {
		return $this->items->getElements();
	}

}
?>