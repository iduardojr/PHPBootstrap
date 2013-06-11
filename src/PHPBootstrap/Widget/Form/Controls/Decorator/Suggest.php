<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Auto Sugestуo
 */
class Suggest extends AbstractRender implements Suggestible {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.suggest';
	
	/**
	 * Aчуo
	 *
	 * @var Action
	 */
	protected $action;

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
	 * Atraso de envio
	 *
	 * @var integer
	 */
	protected $delay;
	
	/**
	 * Construtor
	 * 
	 * @param Action $action
	 * @param integer $minLength
	 * @param integer $delay
	 * @param integer $items
	 */
	public function __construct( Action $action, $minLength = null, $delay = null, $items = null ) {
		$this->setAction($action);
		$this->setMinLength($minLength);
		$this->setDelay($delay);
		$this->setItems($items);
	}
	
	/**
	 * Obtem aчуo
	 *
	 * @return Action
	 */
	public function getAction() {
		return $this->action;
	}
	
	/**
	 * Atribui aчуo
	 *
	 * @param Action $action
	 */
	public function setAction( Action $action ) {
		$this->action = $action;
	}

	/**
	 * Obtem atraso de envio em milisegundos
	 *
	 * @return integer
	 */
	public function getDelay() {
		return $this->delay;
	}

	/**
	 * Atribui atraso de envio em milisegundos
	 * 
	 * @param integer $delay
	 */
	public function setDelay( $delay ) {
		$this->delay = ( int ) $delay;
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