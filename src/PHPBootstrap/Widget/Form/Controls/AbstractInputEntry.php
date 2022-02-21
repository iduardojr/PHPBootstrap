<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Validate\Requirable;
use PHPBootstrap\Validate\Patternable;
use PHPBootstrap\Validate\Measurable;

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
	 * @param string $text
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	protected function filter($text) {
		if ( ! ( is_scalar($text) || is_null($text) ) ) {
			throw new \InvalidArgumentException('value is not scalar');
		}
		foreach ( $this->filters as $filter ) {
			$text = call_user_func($filter, $text);
		}
		return $text;
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
		$text = $this->filter($text);
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
	 * Atribui campo requerido
	 *
	 * @param Requirable $nule
	 */
	public function setRequired( Requirable $rule = null ) {
		$this->validator->setRequired($rule);
	}

	/**
	 * Obtem validador do padr�o
	 *
	 * @return Patternable
	 */
	public function getPattern() {
		return $this->validator->getPattern();
	}

	/**
	 * Atribui validador do padrao
	 *
	 * @param Patternable $rule
	 */
	public function setPattern( Patternable $rule = null ) {
		$this->validator->setPattern($rule );
	}

	/**
	 * Obtem o validador da quantidade
	 *
	 * @return Measurable
	 */
	public function getLength() {
		return $this->validator->getLength();
	}

	/**
	 * Atribui validador da quantidade
	 *
	 * @param Measurable $rule
	 */
	public function setLength( Measurable $rule = null ) {
		$this->validator->setLength($rule);
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