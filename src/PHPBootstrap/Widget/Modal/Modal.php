<?php
namespace PHPBootstrap\Widget\Modal;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Button\Btn;
use PHPBootstrap\Widget\Misc\Title;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Button\BtnChain;

/**
 * Janela Modal
 */
class Modal extends AbstractWidget implements BtnChain {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.modal';

	/**
	 * Titulo
	 *
	 * @var Title
	 */
	protected $title;

	/**
	 * Corpo
	 *
	 * @var Widget
	 */
	protected $body;

	/**
	 * Oculto
	 *
	 * @var boolean
	 */
	protected $hide;

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
	 * Botoes
	 *
	 * @var ArrayCollection
	 */
	protected $buttons;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Title $title
	 * @param Widget $body
	 */
	public function __construct( $name, Title $title, Widget $body = null ) {
		$this->setName($name);
		$this->setTitle($title);
		$this->setBody($body);
		$this->setHide(true);
		$this->buttons = new ArrayCollection();
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
	public function setTitle( Title $title ) {
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
	 * Adiciona um botão
	 *
	 * @param Btn $item
	 * @return boolean
	 */
	public function addButton( Btn $item ) {
		if ( $this->buttons->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->buttons->append($item);
		return true;
	}
	
	/**
	 * Obtem um botão a partir do nome
	 *
	 * @param string $name
	 * @return Button
	 */
	public function getButtonByName( $name ) {
		foreach ( $this->buttons as $button ) {
			if ( $button instanceof Button && $button->getName() == $name ) {
				return $button;
			}
			if ( $button instanceof BtnChain ) {
				$button = $button->getButtonByName($name);
				if ( $button ) {
					return $button;
				}
			}
		}
		return null;
	}
	
	/**
	 * Remove um botão
	 *
	 * @param Btn $item
	 * @return boolean
	 */
	public function removeButton( Btn $item ) {
		return $this->buttons->remove($item);
	}
	
	/**
	 * Obtem um iterador para os botoes
	 *
	 * @return \Iterator
	 */
	public function getButtons() {
		return $this->buttons->getElements();
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
		$this->width = ( int ) $width > 0 ? $width : 0;
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
		$this->height = ( int ) $height > 0 ? $height : 0;
	}

	/**
	 * Obtem oculto
	 *
	 * @return boolean
	 */
	public function getHide() {
		return $this->hide;
	}

	/**
	 * Atribui oculto
	 *
	 * @param boolean $hide
	 */
	public function setHide( $hide ) {
		$this->hide = ( bool ) $hide;
	}

}
?>