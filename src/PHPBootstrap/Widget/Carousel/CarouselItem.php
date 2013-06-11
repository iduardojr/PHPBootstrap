<?php
namespace PHPBootstrap\Widget\Carousel;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Containable;
use PHPBootstrap\Widget\Misc\Image;

/**
 * Item do carousel
 */
class CarouselItem extends AbstractRender implements Containable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.carousel.item';

	/**
	 * Imagem
	 *
	 * @var Image
	 */
	protected $image;

	/**
	 * Descriчуo
	 *
	 * @var Widget
	 */
	protected $caption;

	/**
	 * Pai
	 *
	 * @var Carousel
	 */
	protected $parent;

	/**
	 * Construtor
	 *
	 * @param Image $image
	 * @param Widget $caption
	 */
	public function __construct( Image $image, Widget $caption = null ) {
		$this->setImage($image);
		$this->setCaption($caption);
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
	public function setImage( Image $image ) {
		$image->setParent($this);
		$this->image = $image;
	}

	/**
	 * Atribui descriчуo
	 *
	 * @param Widget $caption
	 */
	public function setCaption( Widget $caption = null ) {
		if ( $caption !== null ) {
			$caption->setParent($this);
		}
		$this->caption = $caption;
	}

	/**
	 * Obtem descriчуo
	 *
	 * @return Widget
	 */
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * Obtem pai
	 *
	 * @return Carousel
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Atribui pai
	 *
	 * @param Carousel $parent
	 */
	public function setParent( Carousel $parent = null ) {
		$this->parent = $parent;
	}

}
?>