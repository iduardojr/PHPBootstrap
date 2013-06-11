<?php
namespace PHPBootstrap\Widget\Tooltip;

/**
 * Dica
 */
class Popover extends Tooltip {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tooltip.popover';

	/**
	 * Texto
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * Construtor
	 *
	 * @param string $title
	 * @param string $text
	 * @param string $placement
	 */
	public function __construct( $title, $text, $placement = null ) {
		parent::__construct($title, $placement);
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

}
?>