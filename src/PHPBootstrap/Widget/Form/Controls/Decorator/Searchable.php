<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;

/**
 * Elemento busc�vel
 */
abstract class Searchable extends AbstractRender implements Pluggable {

	/**
	 * A��o
	 *
	 * @var Action
	 */
	protected $action;
	
	/**
	 * Campo de entrada
	 *
	 * @var InputQuery
	 */
	protected $inputQuery;
	
	/**
	 * Construtor
	 *
	 * @param Action $action
	 * @param InputQuery $inputQuery
	 */
	public function __construct( Action $action, InputQuery $inputQuery = null ) {
		$this->setAction($action);
		$this->setInputQuery($inputQuery);
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
	 * Obtem campo de entrada
	 * 
	 * @return InputQuery
	 */
	public function getInputQuery() {
		return $this->inputQuery;
	}

	/**
	 * Atribui campo de entrada
	 * 
	 * @param InputQuery $inputQuery
	 */
	public function setInputQuery( InputQuery $inputQuery = null ) {
		$this->inputQuery = $inputQuery;
	}

}
?>