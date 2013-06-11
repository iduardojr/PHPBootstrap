<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Emblemas
 */
class Badge extends AbstractWidget {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.badge';
	
	// Estilos
	const Success = 'badge-success';
	const Important = 'badge-important';
	const Warning = 'badge-warning';
	const Info = 'badge-info';
	const Inverse = 'badge-inverse';
	
	/**
	 * Texto
	 *
	 * @var string
	 */
	protected $text;
	
	/**
	 * Estilo
	 *
	 * @var BadgeStyle
	 */
	protected $style;
	
	/**
	 * Construtor
	 * - Badge.Success
	 * - Badge.Info
	 * - Badge.Warning
	 * - Badge.Important
	 * - Badge.Inverse
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
	 * - Badge.Success
	 * - Badge.Info
	 * - Badge.Warning
	 * - Badge.Important
	 * - Badge.Inverse
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