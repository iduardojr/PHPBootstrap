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
	 * Obtem formulário
	 *
	 * @return Form
	 */
	public function getForm() {
		return $this->form;
	}

	/**
	 * Atribui Formulário
	 *
	 * @param Form $form
	 */
	public function setForm( Form $form = null ) {
		$this->form = $form;
	}

	/**
	 * Atribui contexto de habilitação
	 *
	 * @param \Closure $handler
	 */
	public function setContextEnabled( \Closure $handler = null ) {
		$this->contextEnabled = $handler;
	}

	/**
	 * Obtem contexto de habilitação
	 *
	 * @return \Closure
	 */
	public function getContextEnabled() {
		return $this->contextEnabled;
	}

}
?>