<?php
namespace PHPBootstrap\Widget\Button;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Misc\Anchor;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Toggle\Togglable;
use PHPBootstrap\Widget\Form\Controls\Decorator\Embeddable;
use PHPBootstrap\Widget\Tooltip\Tooltip;

/**
 * Bot�o
 */
class Button extends Anchor implements Btn, Embeddable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.button';
	
	// Tamanhos
	const Large = 'btn-large';
	const Small = 'btn-small';
	const Mini = 'btn-mini';
	
	// Estilos
	const Primary = 'btn-primary';
	const Info 	  = 'btn-info';
	const Success = 'btn-success';
	const Warning = 'btn-warning';
	const Danger  = 'btn-danger';
	const Inverse = 'btn-inverse';
	const Link 	  = 'btn-link';

	/**
	 * Estilo
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Tamanho
	 *
	 * @var string
	 */
	protected $size;

	/**
	 * Icone
	 *
	 * @var Icon
	 */
	protected $icon;

	/**
	 * Bloco
	 *
	 * @var boolean
	 */
	protected $block;

	/**
	 * Construtor
	 *
	 * @param string|Icon|Tooltip|array $labels
	 * @param Togglable $toggle
	 * @param string|array $styles
	 */
	public function __construct( $labels, Togglable $toggle = null, $styles = null) {
		if ( ! is_array($labels) ) {
			$labels = array($labels);
		}
		foreach( $labels as $label ) {
			if ( $label instanceof Icon ) {
				$this->setIcon($label);
			} elseif ( $label instanceof Tooltip ) {
				$this->setTooltip($label);
			} else {
				$this->setLabel($label);
			}
		}
		if ( $styles !== null ) {
			if ( !is_array($styles) && $styles != null ) {
				$styles = array($styles);
			}
			foreach( $styles as $style ) {
				try {
					$this->setStyle($style);
					continue;
				} catch ( \Exception $e ) {}
				try {
					$this->setSize($style);
					continue;
				} catch ( \Exception $e ) {}
			}
		}
		$this->setToggle($toggle);
	}

	/**
	 * Obtem Icone
	 *
	 * @return Icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Atribui icone
	 *
	 * @param Icon $icon
	 */
	public function setIcon( Icon $icon = null ) {
		if ($icon !== null) {
			$icon->setParent($this);
		}
		$this->icon = $icon;
	}

	/**
	 * Atribui estilo do bot�o: 
	 * - Button.Primary
	 * - Button.Success
	 * - Button.Info
	 * - Button.Warning
	 * - Button.Danger
	 * - Button.Inverse
	 * - Button.Link
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$enum[] = Button::Primary;
		$enum[] = Button::Success;
		$enum[] = Button::Info;
		$enum[] = Button::Warning;
		$enum[] = Button::Danger;
		$enum[] = Button::Inverse;
		$enum[] = Button::Link;
		$this->style = Enum::ensure($style, $enum, null);
	}

	/**
	 * Obtem estilo do bot�o
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}
	
	/**
	 * Atribui tamanho do bot�o:
	 * - Button.Large
	 * - Button.Small
	 * - Button.Mini
	 *
	 * @param string $size
	 * @throws \UnexpectedValueException
	 */
	public function setSize( $size ) {
		$enum[] = Button::Large;
		$enum[] = Button::Small;
		$enum[] = Button::Mini;
		$this->size = Enum::ensure($size, $enum, null);
	}

	/**
	 * Obtem tamanho do bot�o
	 *
	 * @return string
	 */
	public function getSize() {
		return $this->size;
	}

	/**
	 * Obtem bloco
	 *
	 * @return boolean
	 */
	public function getBlock() {
		return $this->block;
	}

	/**
	 * Atribui bloco
	 *
	 * @param boolean $block
	 */
	public function setBlock( $block ) {
		$this->block = ( bool ) $block;
	}

	/**
	 *
	 * @see Anchor::setToggle()
	 * @param Togglable $toggle
	 */
	public function setToggle( Togglable $toggle = null ) {
		$this->toggle = $toggle;
	}

	/**
	 *
	 * @see Anchor::getToggle()
	 * @return Togglable
	 */
	public function getToggle() {
		return $this->toggle;
	}

}
?>