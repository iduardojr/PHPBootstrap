<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Widget\Form\Form;

/**
 * Coluna de Seleção
 */
class ColumnSelect extends Column {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.column.select';

	/**
	 * Contexto de Habilitação
	 *
	 * @var \Closure
	 */
	protected $contextEnabled;
	
	/**
	 * Contexto de Checked
	 *
	 * @var \Closure
	 */
	protected $contextChecked;

	/**
	 * Formulario
	 *
	 * @var Form
	 */
	protected $form;

	/**
	 * Construtor
	 *
	 * @param string $name
	 * @param Form $form
	 */
	public function __construct( $name, Form $form = null ) {
		$this->setName($name);
		$this->setSpan(20);
		$this->setToggle(new TgTableSelect());
		$this->setForm($form);
	}

	/**
	 * Obtem formul�rio
	 *
	 * @return Form
	 */
	public function getForm() {
		return $this->form;
	}

	/**
	 * Atribui Formul�rio
	 *
	 * @param Form $form
	 */
	public function setForm( Form $form = null ) {
		$this->form = $form;
	}

	/**
	 * Atribui contexto de habilita��o
	 *
	 * @param \Closure $handler
	 */
	public function setContextEnabled( \Closure $handler = null ) {
		$this->contextEnabled = $handler;
	}

	/**
	 * Obtem contexto de habilita��o
	 *
	 * @return \Closure
	 */
	public function getContextEnabled() {
		return $this->contextEnabled;
	}

	/**
	 * Atribui contexto de checked
	 *
	 * @param \Closure $handler
	 */
	public function setContextChecked( \Closure $handler = null ) {
		$this->contextChecked = $handler;
	}
	
	/**
	 * Obtem contexto de checked
	 *
	 * @return \Closure
	 */
	public function getContextChecked() {
		return $this->contextChecked;
	}
}
?>