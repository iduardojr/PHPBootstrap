<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Pattern\Pattern;
use PHPBootstrap\Validate\Required\Requirable;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;

/**
 * Entrada de texto abstrata
 */
abstract class AbstractInputEntry extends AbstractInputBox implements TextEditable, InputQuery {

	/**
	 * Filtro da entrada de texto
	 *
	 * @var ArrayCollection
	 */
	protected $filters;
	
	/**
	 * Construtor
	 *
	 * @param string $name
	 */
	public function __construct( $name ) {
		$this->filters = new ArrayCollection();
		parent::__construct($name);
		$this->addFilter('trim');
	}
	
	/**
	 * Atribui campo requerido
	 *
	 * @param Requirable $nule
	 * @param string $message
	 */
	public function setRequired( Requirable $rule = null, $message = null ) {
		$this->validator->setRequired($rule, $message);
	}

	/**
	 * Adiciona um filtro de entrada de texto
	 *
	 * @param callback $filter
	 * @throws \InvalidArgumentException
	 */
	public function addFilter( $filter ) {
		if ( ! ( is_callable($filter) ) ) {
			throw new \InvalidArgumentException('filter not is callback');
		}
		$this->filters->add($filter);
	}

	/**
	 * Remove um filtro de entrada de texto
	 *
	 * @param callback $filter
	 */
	public function removeFilter( $filter ) {
		$this->filters->remove($filter);
	}

	/**
	 *
	 * @see TextEditable::setText()
	 */
	public function setText( $text ) {
		if ( ! ( is_scalar($text) || is_null($text) ) ) {
			throw new \InvalidArgumentException('value is not scalar');
		}
		foreach ( $this->filters as $filter ) {
			$text = call_user_func($filter, $text);
		}
		$this->setValue($text);
	}

	/**
	 *
	 * @see TextEditable::getText()
	 */
	public function getText() {
		return $this->value;
	}

	/**
	 * Obtem validador do padrão
	 *
	 * @return Pattern
	 */
	public function getPattern() {
		return $this->validator->getPattern();
	}

	/**
	 * Atribui validador do padrao
	 *
	 * @param Pattern $rule
	 * @param string $message
	 */
	public function setPattern( Pattern $rule = null, $message = null ) {
		$this->validator->setPattern($rule, $message);
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Length
	 */
	public function getLength() {
		return $this->validator->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Length $rule
	 * @param string $message
	 */
	public function setLength( Length $rule = null, $message = null ) {
		$this->validator->setLength($rule, $message);
	}
	
	/**
	 *
	 * @see AbstractInput::getContextValue()
	 */
	public function getContextValue() {
		return $this->getText();
	}

}
?>