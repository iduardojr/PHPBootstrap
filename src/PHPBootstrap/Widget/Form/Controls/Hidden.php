<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Format\Formatter;
use PHPBootstrap\Validate\Required\Requirable;
use PHPBootstrap\Validate\Length\Length;
use PHPBootstrap\Validate\Pattern\Pattern;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;

/**
 * Campo oculto
 */
class Hidden extends AbstractInput implements TextEditable, InputQuery, InputPicker {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.hidden';

	/**
	 * Filtro da entrada de texto
	 *
	 * @var ArrayCollection
	 */
	protected $filters;
	
	/**
	 * Formatador
	 *
	 * @var Formatter
	 */
	protected $formatter;
	
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
			throw new \InvalidArgumentException('filter not is callable');
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
	 * Atribui um formatador
	 *
	 * @param Formatter $formatter
	 */
	public function setFormatter( Formatter $formatter = null ) {
		$this->formatter = $formatter;
	}
	
	/**
	 * Obtem o formatador
	 *
	 * @return Formatter
	 */
	public function getFormatter() {
		return $this->formatter;
	}
	
	/**
	 *
	 * @see TextEditable::setText()
	 */
	public function setText( $text ) {
		if ( ! ( is_scalar($text) || is_null($text) ) ) {
			throw new \InvalidArgumentException('value is not scalar');
		}
		foreach ( $this->filters->getIterator() as $filter ) {
			$text = call_user_func($filter, $text);
		}
		if ( $this->value !== $text ) {
			$this->valid = null;
			$this->value = $text;
		}
	}
	
	/**
	 *
	 * @see TextEditable::getText()
	 */
	public function getText() {
		return $this->value;
	}
	
	/**
	 *
	 * @see AbstractInput::setValue()
	 */
	public function setValue($value) {
		if ( isset($this->formatter) ) {
			$value = $this->formatter->format($value);
		}
		$this->setText($value);
	}
	
	/**
	 *
	 * @see AbstractInput::getValue()
	 */
	public function getValue() {
		$value = $this->getText();
		if ( isset($this->formatter) ) {
			return $this->formatter->parse($this->value);
		}
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