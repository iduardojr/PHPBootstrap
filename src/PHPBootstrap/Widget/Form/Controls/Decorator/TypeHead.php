<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\AbstractRender;

/**
 * Coleзгo de Itens autocompletaveis
 */
class TypeHead extends AbstractRender implements Suggestible {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.typehead';

	/**
	 * Fonte
	 *
	 * @var array
	 */
	protected $source;

	/**
	 * Quantidade de items
	 *
	 * @var integer
	 */
	protected $items;

	/**
	 * Quantidade de caracteres
	 *
	 * @var integer
	 */
	protected $minLength;

	/**
	 * Construtor
	 * 
	 * @param array $source
	 * @param integer $minLength
	 * @param integer $items
	 */
	public function __construct( array $source = array(), $minLength = null, $items = null ) {
		$this->setSource($source);
		$this->setMinLength($minLength);
		$this->setItems($items);
	}

	/**
	 * Obtem a fonte de dados
	 *
	 * @return array
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * Atribui a fonte de dados
	 *
	 * @param array $source
	 */
	public function setSource( array $source ) {
		$this->source = $source;
	}

	/**
	 * Obtem a quantidade de itens a exibir
	 *
	 * @return integer
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * Atribui a quantidade de itens a exibir
	 *
	 * @param integer $items
	 */
	public function setItems( $items ) {
		$this->items = ( int ) $items;
	}

	/**
	 * Obtem a quantidade de caracteres
	 *
	 * @return integer
	 */
	public function getMinLength() {
		return $this->minLength;
	}

	/**
	 * Atribui a quantidade de caracteres
	 *
	 * @param integer $minLength
	 */
	public function setMinLength( $minLength ) {
		$this->minLength = ( int ) $minLength;
	}

}
?>