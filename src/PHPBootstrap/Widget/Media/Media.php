<?php
namespace PHPBootstrap\Widget\Media;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Midia
 */
class Media extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.media';
	
	// Alinhamento
	const Left = 'pull-left';
	const Right = 'pull-right';
	
	/**
	 * Titulo
	 *
	 * @var Title
	 */
	protected $title;

	/**
	 * Imagem
	 *
	 * @var Image
	 */
	protected $image;

	/**
	 * Corpo
	 *
	 * @var Widget
	 */
	protected $body;
	
	/**
	 * Alternador
	 *
	 * @var Pluggable
	 */
	protected $toggle;

	/**
	 * Alinhamento
	 *
	 * @var string
	 */
	protected $align;

	/**
	 * Construtor
	 */
	public function __construct() {
		$this->setAlign(null);
	}
	
	/**
	 * Obtem titulo
	 *
	 * @return Title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Atribui titulo
	 *
	 * @param Title $title
	 */
	public function setTitle( Title $title = null ) {
		if ( $title !== null ) {
			$title->setParent($this);
		}
		$this->title = $title;
	}
	
	/**
	 * Obtem corpo
	 *
	 * @return Widget
	 */
	public function getBody() {
		return $this->body;
	}
	
	/**
	 * Atribui corpo
	 *
	 * @param Widget $body
	 */
	public function setBody( Widget $body = null ) {
		if ( $body !== null ) {
			$body->setParent($this);
		}
		$this->body = $body;
	}
	

	/**
	 * Obtem imagem
	 *
	 * @return Image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Atribui imagem
	 *
	 * @param Image $image
	 */
	public function setImage( Image $image = null ) {
		if ( $image !== null ) {
			$image->setParent($this);
		}
		$this->image = $image;
	}

	/**
	 * Obtem alinhamento
	 *
	 * @return string
	 */
	public function getAlign() {
		return $this->align;
	}

	/**
	 * Atribui um alinhamento
	 *
	 * @param string $align
	 */
	public function setAlign( $align ) {
		$this->align = Enum::ensure($align, $this, Media::Left);
	}

	/**
	 * Obtem alternador
	 *
	 * @return Pluggable
	 */
	public function getToggle() {
		return $this->toggle;
	}

	/**
	 * Atribui alternador
	 *
	 * @param Pluggable $toggle
	 */
	public function setToggle( Pluggable $toggle = null ) {
		$this->toggle = $toggle;
	}

	
}
?>