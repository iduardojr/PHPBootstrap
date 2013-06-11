<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Common\Enum;

/**
 * Item da navegaчуo
 */
class NavItem {
	
	// Alinhamentos
	const Left = 'pull-left';
	const Right = 'pull-right';

	/**
	 * Elemento
	 *
	 * @var Element
	 */
	protected $element;

	/**
	 * Alinhamento
	 *
	 * @var string
	 */
	protected $align;

	/**
	 * Construtor 
	 * - NavItem.Left 
	 * - NavItem.Right
	 *
	 * @param Element $element
	 * @param string $align
	 * @throws \UnexpectedValueException
	 */
	public function __construct( Element $element, $align ) {
		$this->element = $element;
		$this->align = Enum::ensure($align, $this, null);
	}

	/**
	 * Obtem o elemento
	 *
	 * @return Element
	 */
	public function getElement() {
		return $this->element;
	}

	/**
	 * Obtem o alinhamento
	 *
	 * @return string
	 */
	public function getAlign() {
		return $this->align;
	}

}
?>