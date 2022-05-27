<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Format\Formatter;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\Form\TextEditable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputQuery;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;
use PHPBootstrap\Validate\Measurable;
use PHPBootstrap\Validate\Patternable;
use PHPBootstrap\Validate\Requirable;
use PHPBootstrap\Widget\Form\Controls\Decorator\Embeddable;

/**
 * Campo oculto
 */
class Hidden extends AbstractInput implements TextEditable, InputQuery, InputPicker, Embeddable {

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
		$text = $this->filter($text);
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

}
?>