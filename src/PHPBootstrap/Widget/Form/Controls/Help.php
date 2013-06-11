<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Ajuda
 */
class Help extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.help';

	/**
	 * Em linha
	 *
	 * @var boolean
	 */
	protected $inline;

	/**
	 * Texto
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * Construtor
	 *
	 * @param string $text
	 * @param boolean $inline
	 */
	public function __construct( $text, $inline = true ) {
		$this->setText($text);
		$this->setInline($inline);
	}

	/**
	 * Obtem em linha
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
	 * Obtem texto
	 *
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Atribui texto
	 *
	 * @param string $text
	 */
	public function setText( $text ) {
		$this->text = $text;
	}

}
?>