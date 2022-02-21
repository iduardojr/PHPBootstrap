<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Auto Sugest�o
 */
class Suggest extends AbstractRender implements Suggestible {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.suggest';
	
	/**
	 * A��o
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
	 * Corresponder resultados
	 * 
	 * @var boolean
	 */
	protected $matcher;
	
	/**
	 * Ordernar resultados
	 * 
	 * @var boolean
	 */
	protected $sorter;
	
	/**
	 * Construtor
	 * 
	 * @param Action $action
	 * @param integer $minLength
	 * @param integer $delay
	 * @param integer $items
	 * @param boolean $matcher
	 * @param boolean $sorter
	 */
	public function __construct( Action $action, $minLength = null, $delay = null, $items = null, $matcher = true, $sorter = true ) {
		$this->setAction($action);
		$this->setMinLength($minLength);
		$this->setDelay($delay);
		$this->setItems($items);
		$this->setMatcher($matcher);
		$this->setSorter($sorter);
	}
	
	/**
	 * Obtem a��o
	 *
	 * @return Action
	 */
	public function getAction() {
		return $this->action;
	}
	
	/**
	 * Atribui a��o
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
	
	/**
	 * @return boolean
	 */
	public function isMatcher() {
		return $this->matcher;
	}
	
	/**
	 * @param boolean $matcher
	 */
	public function setMatcher($matcher) {
		$this->matcher = (bool) $matcher;
	}
	/**
	 * @return boolean
	 */
	public function isSorter() {
		return $this->sorter;
	}

	/**
	 * @param boolean $sorter
	 */
	public function setSorter($sorter) {
		$this->sorter = (bool) $sorter;
	}

}
?>