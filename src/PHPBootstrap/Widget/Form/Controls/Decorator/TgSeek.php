<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;

/**
 * Alternador de busca
 */
class TgSeek extends Searchable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.seek';
	
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

}
?>