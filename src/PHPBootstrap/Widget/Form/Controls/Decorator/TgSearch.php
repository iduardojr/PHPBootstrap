<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\Modal\Modal;

/**
 * Alternador de busca
 */
class TgSearch extends AbstractRender implements Pluggable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.search';

	/**
	 * Aчуo
	 *
	 * @var Action
	 */
	protected $action;
	
	/**
	 * Pergunta
	 *
	 * @var InputQuery
	 */
	protected $query;
	
	/**
	 * Saida
	 *
	 * @var Modal
	 */
	protected $output;
	
	/**
	 * Construtor
	 *
	 * @param Action $action
	 * @param InputQuery $query
	 * @param Modal $output
	 */
	public function __construct( Action $action, InputQuery $query = null, Modal $output = null ) {
		$this->setAction($action);
		$this->setQuery($query);
		$this->setOutput($output);
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
	 * Obtem pergunta
	 * 
	 * @return InputQuery
	 */
	public function getQuery() {
		return $this->query;
	}

	/**
	 * Atribui pergunta
	 * 
	 * @param InputQuery $query
	 */
	public function setQuery( InputQuery $query = null ) {
		$this->query = $query;
	}
	
	/**
	 * Obtem saida
	 *
	 * @return Modal
	 */
	public function getOutput() {
		return $this->output;
	}
	
	/**
	 * Atribui saida
	 *
	 * @param Modal $output
	 */
	public function setOutput( Modal $output = null ) {
		$this->output = $output;
	}

}
?>