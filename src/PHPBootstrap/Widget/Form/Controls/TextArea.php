<?php
namespace PHPBootstrap\Widget\Form\Controls;

/**
 * Area de texto
 */
class TextArea extends AbstractInputEntry {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.textarea';

	/**
	 * Linhas
	 *
	 * @var integer
	 */
	protected $rows;
	
	/**
	 *
	 * @see AbstractInputTextBox::setFilter()
	 */
	public function setFilter( $filter ) {
		parent::setFilter($filter);
	}
	
	/**
	 * Obtem a quantidade de linhas
	 *
	 * @return integer
	 */
	public function getRows() {
		return $this->rows;
	}

	/**
	 * Atribui a quantidade de linhas
	 *
	 * @param integer $rows
	 */
	public function setRows( $rows ) {
		$this->rows = ( int ) $rows;
	}

}
?>