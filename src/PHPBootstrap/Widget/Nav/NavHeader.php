<?php
namespace PHPBootstrap\Widget\Nav;

/**
 * Cabeçalho
 */
class NavHeader extends AbstractElement implements NavElement {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.header';

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