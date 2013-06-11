<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Paragrafo
 */
class Paragraph extends AbstractWidget {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.paragraph';
	
	// Alinhamentos
	const Left = 'text-left';
	const Center = 'text-center';
	const Right = 'text-right';
	
	// Estilos
	const Muted = 'muted';
	const Success = 'text-success';
	const Error = 'text-error';
	const Warning = 'text-warning';
	const Info = 'text-info';

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
	 * Alinhamento
	 *
	 * @var string
	 */
	protected $align;

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
	 * Obtem o alinhamento do texto
	 *
	 * @return string
	 */
	public function getAlign() {
		return $this->align;
	}

	/**
	 * Atribui alinhamento do texto:
	 * - Paragraph::Left
	 * - Paragraph::Center
	 * - Paragraph::Right
	 *
	 * @param string $align
	 * @throws \UnexpectedValueException
	 */
	public function setAlign( $align ) {
		$enum[] = Paragraph::Left;
		$enum[] = Paragraph::Center;
		$enum[] = Paragraph::Right;
		$this->align = Enum::ensure($align, $enum, null);
	}

	/**
	 * Obtem o estilo do texto
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * Atribui o estilo do texto:
	 * - Paragraph::Muted
	 * - Paragraph::Success
	 * - Paragraph::Info
	 * - Paragraph::Warning
	 * - Paragraph::Error
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$enum[] = Paragraph::Muted;
		$enum[] = Paragraph::Success;
		$enum[] = Paragraph::Error;
		$enum[] = Paragraph::Info;
		$enum[] = Paragraph::Warning;
		$this->style = Enum::ensure($style, $enum, null);
	}

}
?>