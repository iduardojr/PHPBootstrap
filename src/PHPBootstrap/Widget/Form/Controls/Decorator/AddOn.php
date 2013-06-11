<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Elemento adicionavel
 */
class AddOn extends AbstractRender implements Embeddable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.addon';

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
	 */
	public function __construct( $text ) {
		$this->setText($text);
	}

	/**
	 * Obtem Texto
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