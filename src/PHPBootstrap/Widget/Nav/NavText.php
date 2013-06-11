<?php
namespace PHPBootstrap\Widget\Nav;

/**
 * Texto
 */
class NavText extends AbstractElement implements NavbarElement {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.text';

	/**
	 * Texto
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * Construtor
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

}
?>