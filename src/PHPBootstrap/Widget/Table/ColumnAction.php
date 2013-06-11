<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Button\Button;
use PHPBootstrap\Widget\Misc\Icon;
use PHPBootstrap\Widget\Tooltip\Tooltip;
use PHPBootstrap\Widget\Toggle\Parameterizable;

/**
 * Coluna de aчуo
 */
class ColumnAction extends Column {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.column.action';
	
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
	 * Dica
	 *
	 * @var Tooltip
	 */
	protected $tooltip;
	
	/**
	 * Contexto de Habilitaчуo
	 *
	 * @var \Closure
	 */
	protected $contextEnabled;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param string|Icon $label
	 * @param Parameterizable $toggle
	 */
	public function __construct( $name, $label, Parameterizable $toggle = null ) {
		if ( $label instanceof Icon ) {
			$this->setIcon($label);
			$this->setSpan(20);
		} else {
			$this->setLabel($label);
		}
		$this->setName($name);
		$this->setToggle($toggle);
		$this->setStyle(Button::Link);
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
		$this->icon = $icon;
	}
	
	/**
	 * Atribui estilo do botуo: 
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
	 * Obtem estilo do botуo
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}
	
	/**
	 * Atribui tamanho do botуo:
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
	 * Obtem tamanho do botуo
	 *
	 * @return string
	 */
	public function getSize() {
		return $this->size;
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
	 * Atribui contexto de habilitaчуo
	 *
	 * @param \Closure $handler
	 * @throws \InvalidArgumentException
	 */
	public function setContextEnabled( \Closure $handler = null ) {
		$this->contextEnabled = $handler;
	}

	/**
	 * Obtem contexto de habilitaчуo
	 *
	 * @return \Closure
	 */
	public function getContextEnabled() {
		return $this->contextEnabled;
	}
	
	/**
	 * 
	 * @see Column::setToggle()
	 * @param Parameterizable $toggle
	 */
	public function setToggle( Parameterizable $toggle = null ) {
		$this->toggle = $toggle;
	}
}
?>