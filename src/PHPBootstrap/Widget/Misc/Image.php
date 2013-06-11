<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Imagem
 */
class Image extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.image';
	
	// Estilo
	const Rounded = 'img-rounded';
	const Circle = 'img-circle';
	const Polaroid = 'img-polaroid';

	/**
	 * Fonte
	 *
	 * @var string
	 */
	protected $source;

	/**
	 * Estilo
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Construtor
	 * - Image.Rounded
	 * - Image.Circle
	 * - Image.Polaroid
	 *
	 * @param string $source
	 * @param string $style
	 */
	public function __construct( $source, $style = null ) {
		$this->setSource($source);
		$this->setStyle($style);
	}

	/**
	 * Atribui Fonte
	 *
	 * @param string $source
	 */
	public function setSource( $source ) {
		$this->source = $source;
	}

	/**
	 * Obtem fonte
	 *
	 * @return string
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * Atribui estilo:
	 * - Image.Rounded
	 * - Image.Circle
	 * - Image.Polaroid
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$this->style = Enum::ensure($style, $this, null);
	}

	/**
	 * Obtem estilo
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

}
?>