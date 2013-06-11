<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\AbstractContainer;

/**
 * Conjunto de campos
 */
class Fieldset extends AbstractContainer {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.output.fieldset';

	/**
	 * Legenda
	 *
	 * @var string
	 */
	protected $legend;

	/**
	 * Construtor
	 *
	 * @param string $legend
	 */
	public function __construct( $legend ) {
		parent::__construct();
		$this->setLegend($legend);
	}

	/**
	 * Obtem legenda
	 *
	 * @return string
	 */
	public function getLegend() {
		return $this->legend;
	}

	/**
	 * Atribui legenda
	 * 
	 * @param string $legend
	 */
	public function setLegend( $legend ) {
		$this->legend = $legend;
	}

}
?>