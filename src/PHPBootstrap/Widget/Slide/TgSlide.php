<?php
namespace PHPBootstrap\Widget\Slide;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Alternador de correr
 */
class TgSlide extends AbstractRender implements Pluggable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.slide.toggle';

	// Direзгo
	const Prev = 'prev';
	const Next = 'next';

	/**
	 * Direзгo
	 *
	 * @var string
	 */
	protected $slide;

	/**
	 * Alvo
	 *
	 * @var Slide
	 */
	protected $target;

	/**
	 * Construtor
	 *
	 * @param Slide $target
	 * @param string|integer $slide
	 */
	public function __construct( Slide $target, $slide ) {
		$this->setTarget($target);
		$this->setSlide($slide);
	}

	/**
	 * Obtem direзгo
	 *
	 * @return string|integer
	 */
	public function getSlide() {
		return $this->slide;
	}

	/**
	 * Atribui direзгo:
	 * - TgSlide.Prev
	 * - TgSlide.Next
	 *
	 * @param string|integer $slide
	 */
	public function setSlide( $slide ) {
		if ( preg_match('/^[0-9]+$/', $slide) > 0 ) {
			$this->slide = ( int ) $slide;
		} else {
			$this->slide = Enum::ensure($slide, $this);
		}
	}

	/**
	 * Obtem alvo
	 *
	 * @return Slide
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param Slide $target
	 */
	public function setTarget( Slide $target ) {
		$this->target = $target;
	}

	/**
	 *
	 * @see ToggleDeep::setParameters()
	 */
	public function setParameters( array $paramters ) {
	}

}
?>