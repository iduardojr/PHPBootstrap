<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Modal\Modal;
use PHPBootstrap\Widget\Form\Controls\Decorator\TgResearch;
use PHPBootstrap\Widget\Action\Action;

/**
 * Caixa de pesquisa
 */
class ResearchBox extends AbstractTextBoxSearch {
	
	/**
	 * Construtor
	 * 
	 * 
	 * @param string $name
	 * @param Action $action
	 * @param Modal $outputModal
	 */
	public function __construct( $name, Action $action, Modal $outputModal ) {
		$this->toggle = new TgResearch($action, $outputModal);
		parent::__construct($name);
		$this->setEnableQuery(true);
	}
}
?>