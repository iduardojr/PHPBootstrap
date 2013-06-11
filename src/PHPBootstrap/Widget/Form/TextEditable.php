<?php
namespace PHPBootstrap\Widget\Form;

/**
 * Interface de um input baseado em texto
 */
interface TextEditable extends Inputable {

	/**
	 * Obtem o texto
	 * 
	 * @return string
	 */
	public function getText();

	/**
	 * Atribui o texto
	 * 
	 * @param string $text
	 * @throws \InvalidArgumentException
	 */
	public function setText( $text );

}
?>
