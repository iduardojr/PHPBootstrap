<?php
namespace PHPBootstrap\Widget\Misc;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractWidget;

/**
 * Titulo
 */
class Title extends AbstractWidget {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.misc.title';
	
	// Alinhamento
	const Left = 'text-left';
	const Center = 'text-center';
	const Right = 'text-right';
	
	// Estilo
	const Muted = 'muted';
	const Success = 'text-success';
	const Error = 'text-error';
	const Warning = 'text-warning';
	const Info = 'text-info';

	/**
	 * Nivel
	 *
	 * @var integer
	 */
	protected $level;

	/**
	 * Titulo
	 *
	 * @var string
	 */
	protected $title;
	
	/**
	 * SubTexto
	 *
	 * @var string
	 */
	protected $subtext;
	
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
	 * Cabeçalho de pagina
	 *
	 * @var boolean
	 */
	protected $pageHeader;

	/**
	 * Construtor
	 *
	 * @param string $title
	 * @param integer $level
	 */
	public function __construct( $title, $level = 1 ) {
		$this->setTitle($title);
		$this->setLevel($level);
	}

	/**
	 * Obtem level
	 *
	 * @return integer
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * Atribui nivel
	 *
	 * @param integer $level
	 */
	public function setLevel( $level ) {
		$this->level = ( int ) $level >= 1 && $level <= 6 ? $level : 1;
	}

	/**
	 * Obtem titulo
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Atribui titulo
	 *
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}
	
	/**
	 * Obtem subtexto
	 *
	 * @return string
	 */
	public function getSubtext() {
		return $this->subtext;
	}
	
	/**
	 * Atribui subtexto
	 *
	 * @param string $subtext
	 */
	public function setSubtext( $subtext ) {
		$this->subtext = $subtext;
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
	 * - Title::Left
	 * - Title::Center
	 * - Title::Right
	 *
	 * @param string $align
	 * @throws \UnexpectedValueException
	 */
	public function setAlign( $align ) {
		$enum[] = Title::Left;
		$enum[] = Title::Center;
		$enum[] = Title::Right;
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
	 * - Title::Muted
	 * - Title::Success
	 * - Title::Info
	 * - Title::Warning
	 * - Title::Error
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$enum[] = Title::Muted;
		$enum[] = Title::Success;
		$enum[] = Title::Error;
		$enum[] = Title::Info;
		$enum[] = Title::Warning;
		$this->style = Enum::ensure($style, $enum, null);
	}

	/**
	 * Obtem cabecalho de pagina
	 *
	 * @return boolean
	 */
	public function getPageHeader() {
		return $this->pageHeader;
	}

	/**
	 * Atribui cabecalho de pagina
	 *
	 * @param boolean $pageHeader
	 */
	public function setPageHeader( $pageHeader ) {
		$this->pageHeader = ( bool ) $pageHeader;
	}

}
?>