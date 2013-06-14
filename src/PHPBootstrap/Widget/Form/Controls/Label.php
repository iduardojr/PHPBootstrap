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
	 * @param Inputable $target
	 */
	public function __construct( $text, Inputable $target = null ) {
		$this->setText($text);
		$this->setTarget($target);
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
	public function setTarget( Inputable $target = null ) {
		$this->target = $target;
	}

}
?>