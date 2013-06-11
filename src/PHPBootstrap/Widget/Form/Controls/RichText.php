<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Common\Enum;

/**
 * Editor de texto
 */
class RichText extends TextArea {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.input.richtext';

	// Tipos
	const Standard = 'standard';
	const Advanced = 'advanced';
	
	/**
	 * Tipo
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * Construtor
	 * - RichText.Standard
	 * - RichText.Advanced
	 *
	 * @param string $name
	 * @param string $type
	 */
	public function __construct( $name, $type = null ) {
		parent::__construct($name);
		$this->setType($type);
	}

	/**
	 * Obtem tipo
	 * 
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Atribui tipo:
	 * - RichText.Standard
	 * - RichText.Advanced
	 * 
	 * @param string $type
	 * @throws \UnexpectedValueException
	 */
	public function setType( $type ) {
		$this->type = Enum::ensure($type, $this, RichText::Standard);
	}

}
?>