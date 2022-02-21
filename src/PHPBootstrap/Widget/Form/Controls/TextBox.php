<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Format\Formatter;
use PHPBootstrap\Widget\Form\Controls\Decorator\Mask;
use PHPBootstrap\Widget\Form\Controls\Decorator\Maskable;
use PHPBootstrap\Widget\Form\Controls\Decorator\InputPicker;
use PHPBootstrap\Widget\Form\Controls\Decorator\Suggestible;
use PHPBootstrap\Widget\Form\TextEditable;


/**
 * Campo de Entrada de Texto
 */
class TextBox extends AbstractInputTextBox implements InputPicker {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.textbox';

	/**
	 * Mascara de entrada
	 *
	 * @var Maskable
	 */
	protected $mask;

	/**
	 * Sugest�o
	 *
	 * @var Suggestible
	 */
	protected $suggestion;
	
	/**
	 * Formatador
	 *
	 * @var Formatter
	 */
	protected $formatter;

	/**
	 * Atribui sugest�o
	 *
	 * @param Suggestible $suggestion
	 */
	public function setSuggestion( Suggestible $suggestion = null ) {
		$this->suggestion = $suggestion;
	}

	/**
	 * Obtem sugest�o
	 *
	 * @return Suggestible
	 */
	public function getSuggestion() {
		return $this->suggestion;
	}

	/**
	 * Atribui a mascara de entrada
	 *
	 * @param string|Maskable $mask
	 * @throws \InvalidArgumentException
	 */
	public function setMask( $mask ) {
		if ( empty($mask) ) {
			$mask = null;
		} elseif ( is_string($mask) ) {
			$mask = new Mask($mask);
		} elseif ( ! $mask instanceof Maskable ) {
			throw new \InvalidArgumentException('mask not is instance of PHPBootstrap\Widget\Form\Controls\Mask\Maskable');
		}
		$this->mask = $mask;
	}

	/**
	 * Obtem a mascara de entrada
	 *
	 * @return Maskable
	 */
	public function getMask() {
		return $this->mask;
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

}
?>