<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Modal\Modal;

/**
 * Alternador de pesquisa
 */
class TgResearch extends Searchable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.form.control.decorator.research';

	/**
	 * Modal de saida
	 *
	 * @var Modal
	 */
	protected $outputModal;

	/**
	 * Construtor
	 *
	 * @param Action $action
	 * @param Modal $outputModal
	 * @param InputQuery $inputQuery
	 */
	public function __construct( Action $action, Modal $outputModal, InputQuery $inputQuery = null ) {
		$this->setAction($action);
		$this->setOutputModal($outputModal);
		$this->setInputQuery($inputQuery);
	}
	
	/**
	 * Obtem modal de saida
	 *
	 * @return Modal
	 */
	public function getOutputModal() {
		return $this->outputModal;
	}

	/**
	 * Atribui modal de saida
	 *
	 * @param Modal $outputModal
	 */
	public function setOutputModal( Modal $outputModal ) {
		$this->outputModal = $outputModal;
	}

}
?>