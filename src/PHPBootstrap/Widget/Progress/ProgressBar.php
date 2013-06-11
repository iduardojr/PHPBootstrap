<?php
namespace PHPBootstrap\Widget\Progress;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Common\ArrayCollection;
use PHPBootstrap\Widget\AbstractWidget;

/**
 * Barra de Progresso
 */
class ProgressBar extends AbstractWidget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.progress';

	// Estilo
	const Striped = 'progress-striped';
	const Animated = 'progress-striped active';

	/**
	 * Estilo
	 *
	 * @var string
	 */
	protected $style;

	/**
	 * Barras
	 *
	 * @var ArrayCollection
	 */
	protected $items;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Bar $bar
	 * @param ...
	 */
	public function __construct( $name, Bar $bar = null ) {
		$this->setName($name);
		$this->items = new ArrayCollection();
		$bars = func_get_args();
		array_shift($bars);
		foreach ( $bars as $i => $bar ) {
			$this->addBar($bar);
		}
	}
	
	/**
	 * Adiciona uma barra
	 *
	 * @param Bar $item
	 */
	public function addBar( Bar $item ) {
		if ( $this->items->contains($item) ) {
			return false;
		}
		$item->setParent($this);
		$this->items->append($item);
		return true;
	}

	/**
	 * Remove uma barra
	 *
	 * @param Bar $item
	 */
	public function removeBar( Bar $item ) {
		return $this->items->remove($item);
	}

	/**
	 * Obtem um iterador para os barras
	 *
	 * @return \Iterator
	 */
	public function getBars() {
		return $this->items->getElements();
	}

	/**
	 * Atribui estilo: 
	 * - ProgressBar.Striped
	 * - ProgressBar.Animated
	 *
	 * @param string $style
	 * @throws \UnexpectedValueException
	 */
	public function setStyle( $style ) {
		$this->style = Enum::ensure($style, $this, null);
	}

	/**
	 * Obtem tipo
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

}
?>