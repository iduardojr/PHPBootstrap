<?php
namespace PHPBootstrap\Widget\Form;

use PHPBootstrap\Widget\Widget;

/**
 * Interface de um campo de entrada de dados
 */
interface Inputable extends Widget {

	/**
	 * Atribui valor
	 *
	 * @param mixed $value
	 * @throws \InvalidArgumentException
	 */
	public function setValue( $value );

	/**
	 * Obtem valor
	 *
	 * @return mixed
	 */
	public function getValue();

	/**
	 * Prepara o campo antes de renderizar o formulario
	 *
	 * @param Form $form
	 */
	public function prepare( Form $form );

	/**
	 * Valida o campo
	 *
	 * @return boolean
	 */
	public function valid();

	/**
	 * Obtem as mensagens de erro
	 *
	 * @return \Iterator
	 */
	public function getFailMessages();

}
?>