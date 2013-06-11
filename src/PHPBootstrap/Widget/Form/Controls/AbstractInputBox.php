<?php
namespace PHPBootstrap\Widget\Form\Controls;

/**
 * Campo de entrada abstrato em caixa
 */
abstract class AbstractInputBox extends AbstractInputSpan {

	/**
	 * Texto reservado
	 *
	 * @var string
	 */
	protected $placeholder;

	/**
	 * Obtem texto reservado
	 *
	 * @return string
	 */
	public function getPlaceholder() {
		return $this->placeholder;
	}

	/**
	 * Atribui texto reservado
	 *
	 * @param string $placeholder
	 */
	public function setPlaceholder( $placeholder ) {
		$this->placeholder = $placeholder;
	}

}
?>