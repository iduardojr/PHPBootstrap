<?php
namespace PHPBootstrap\Widget\Action;

/**
 * Aчуo que abre uma nova janela
 */
class TgWindows extends TgLink {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.action.windows';

	/**
	 * Largura
	 *
	 * @var integer
	 */
	protected $width;

	/**
	 * Altura
	 *
	 * @var integer
	 */
	protected $height;
	
	/**
	 * Construtor
	 * 
	 * @param Action $action
	 * @param integer $width
	 * @param integer $height
	 */
	public function __construct( Action $action, $width = null, $height = null ) {
		parent::__construct($action);
		$this->setSize($width, $height);
	}

	/**
	 * Atribui dimensoes da janela
	 * 
	 * @param integer $width
	 * @param integer $height
	 */
	public function setSize( $width, $height ) {
		$this->setWidth($width);
		$this->setHeight($height);
	}

	/**
	 * Obtem largura
	 *
	 * @return integer
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * Atribui Largura
	 *
	 * @param integer $width
	 */
	public function setWidth( $width ) {
		$this->width = ( int ) $width;
	}

	/**
	 * Obtem Altura
	 *
	 * @return integer
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * Atribui altura
	 *
	 * @param integer $height
	 */
	public function setHeight( $height ) {
		$this->height = ( int ) $height;
	}

}
?>