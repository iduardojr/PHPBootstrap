<?php
namespace PHPBootstrap\Widget\Table;

use PHPBootstrap\Widget\Form\Form;

/**
 * Coluna de Sele��o
 */
class ColumnSelect extends Column {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.table.column.select';

	/**
	 * Contexto de Habilita��o
	 *
	 * @var \Closure
	 */
	protected $contextEnabled;

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

}
?>