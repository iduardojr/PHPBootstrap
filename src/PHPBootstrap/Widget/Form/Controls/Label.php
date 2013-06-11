<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Inputable;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Rótulo
 */
class Label extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.output.label';

	/**
	 * Rotulo
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * Campo de entrada
	 *
	 * @var Inputable
	 */
	protected $target;

	/**
	 * Construtor
	 *
	 * @param string $text
	 */
	public function __construct( $text ) {
		$this->setText($text);
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

	/**
	 * Obtem campo de entrada alvo
	 *
	 * @return Inputable
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui campo de entrada alvo
	 *
	 * @param Inputable $target
	 */
	public function setTarget( Inputable $target ) {
		$this->target = $target;
	}

}
?>