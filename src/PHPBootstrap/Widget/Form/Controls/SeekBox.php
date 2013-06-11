<?php
namespace PHPBootstrap\Widget\Form\Controls;

use PHPBootstrap\Widget\Form\Controls\Decorator\TgSeek;
use PHPBootstrap\Widget\Action\Action;

/**
 * Caixa de busca
 */
class SeekBox extends AbstractTextBoxSearch {

	/**
	 * Construtor
	 * 
	 * @param string $name
	 * @param Action $action
	 */
	public function __construct( $name, Action $action ) {
		$this->toggle = new TgSeek($action);
		parent::__construct($name);
		$this->setEnableQuery(true);
	}

}
?>