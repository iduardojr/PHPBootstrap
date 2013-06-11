<?php
namespace PHPBootstrap\Widget\Tooltip;

use PHPBootstrap\Common\Enum;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Dica
 */
class Tooltip extends AbstractRender {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.tooltip';

	// Posiчуo
	const Above = 'top';
	const Below = 'bottom';
	const Left = 'left';
	const Right = 'right';
	
	/**
	 * Titulo
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Atraso
	 *
	 * @var integer
	 */
	protected $delay;

	/**
	 * Animaчуo
	 *
	 * @var boolean
	 */
	protected $animation = true;

	/**
	 * Posiчуo
	 *
	 * @var string
	 */
	protected $placement;

	/**
	 * Construtor
	 *
	 * @param string $title
	 * @param string $placement
	 */
	public function __construct( $title, $placement = null ) {
		$this->setTitle($title);
		$this->setPlacement($placement);
	}

	/**
	 * Obtem atraso
	 *
	 * @return integer
	 */
	public function getDelay() {
		return $this->delay;
	}

	/**
	 * Atribui atraso
	 *
	 * @param integer $delay
	 */
	public function setDelay( $delay ) {
		$this->delay = ( int ) $delay > 0 ? $delay : 0;
	}

	/**
	 * Obtem animaчуo
	 *
	 * @return boolean
	 */
	public function getAnimation() {
		return $this->animation;
	}

	/**
	 * Atribui animaчуo
	 *
	 * @param boolean $animation
	 */
	public function setAnimation( $animation ) {
		$this->animation = ( bool ) $animation;
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
	 * Obtem posicao
	 *
	 * @return string
	 */
	public function getPlacement() {
		return $this->placement;
	}

	/**
	 * Atribui posicao:
	 * - Tooltip.Above
	 * - Tooltip.Below
	 * - Tooltip.Left
	 * - Tooltip.Right
	 * 
	 * @param string $placement
	 * @throws \UnexpectedValueException
	 */
	public function setPlacement( $placement ) {
		$this->placement = Enum::ensure($placement, $this, null);
	}

}
?>