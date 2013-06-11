<?php
namespace PHPBootstrap\Widget\Thumbnail;

use PHPBootstrap\Widget\Widget;

use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Miniatura
 */
class Thumbnail extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.thumbnail';

	/**
	 * Alternador
	 *
	 * @var ToggleDeep
	 */
	protected $toggle;

	/**
	 * Dica
	 *
	 * @var Tooltip
	 */
	protected $tooltip;

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
	 * Construtor
	 *
	 * @param Image $image
	 * @param Pluggable $toggle
	 * @param Tooltip $tooltip
	 * @param Widget $caption
	 */
	public function __construct( Image $image, Pluggable $toggle = null, Tooltip $tooltip = null, Widget $caption = null ) {
		$this->setImage($image);
		$this->setCaption($caption);
		$this->setToggle($toggle);
		$this->setTooltip($tooltip);
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
	 * Obtem dica
	 *
	 * @return Tooltip
	 */
	public function getTooltip() {
		return $this->tooltip;
	}

	/**
	 * Atribui dica
	 *
	 * @param Tooltip $tooltip
	 */
	public function setTooltip( Tooltip $tooltip = null ) {
		$this->tooltip = $tooltip;
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
	public function setToggle( Pluggable $toggle = null) {
		$this->toggle = $toggle;
	}

}
?>