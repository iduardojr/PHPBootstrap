<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Rótulos
 */
class Label extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.label';
	
	// Estilo
	const Success = 'label-success';
	const Important = 'label-important';
	const Warning = 'label-warning';
	const Info = 'label-info';
	const Inverse = 'label-inverse';

	/**
	 * Texto
	 *
	 * @var string
	 */
	protected $text;

	/**
	 * Estilo
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Construtor
	 * - Label.Success
	 * - Label.Info
	 * - Label.Warning
	 * - Label.Important
	 * - Label.Inverse
	 *
	 * @param string $text
	 * @param string $style
	 */
	public function __construct( $text, $style = null ) {
		$this->setText($text);
		$this->setStyle($style);
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
	 * Atribui estilo:
	 * - Label.Success
	 * - Label.Info
	 * - Label.Warning
	 * - Label.Important
	 * - Label.Inverse
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