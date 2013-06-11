<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Action\TgLink;

/**
 * Marca
 */
class NavBrand extends AbstractElement implements NavbarElement {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.brand';

	/**
	 * Alternador
	 *
	 * @var TgLink
	 */
	protected $toggle;

	/**
	 * Conteudo
	 *
	 * @var Widget|string
	 */
	protected $content;

	/**
	 * Construtor
	 *
	 * @param Widget|string $content
	 * @param TgAction $toggle
	 */
	public function __construct( $content, TgLink $toggle = null ) {
		$this->setContent($content);
		$this->setToggle($toggle);
	}

	/**
	 * Atribui um conteudo
	 *
	 * @param Widget|string $content
	 * @throws \InvalidArgumentException
	 */
	public function setContent( $content ) {
		if ( ! (is_scalar($content) || $content instanceof Widget) ) {
			throw new \InvalidArgumentException('content not is string or instance of PHPBootstrap/Widget/Widget');
		}
		$this->content = $content;
	}

	/**
	 * Obtem o conteudo
	 *
	 * @return Widget|string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Obtem alternador
	 *
	 * @return TgLink
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Atribui alternador
	 *
	 * @param TgLink $toggle
	 */
	public function setToggle( TgLink $toggle = null ) {
		$this->toggle = $toggle;
	}

}
?>