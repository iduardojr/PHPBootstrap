<?php
namespace PHPBootstrap\Widget\FileUpload;

use PHPBootstrap\Widget\Action\Action;
use PHPBootstrap\Widget\Toggle\Pluggable;
use PHPBootstrap\Widget\AbstractRender;

/**
 * Alternador de envio de arquivo
 */
class TgFileUpload extends AbstractRender implements Pluggable {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.fileupload.toggle';

	/**
	 * A��o
	 *
	 * @var Action
	 */
	protected $action;
	
	/**
	 * Identifica��o
	 *
	 * @var string
	 */
	protected $identify;

	/**
	 * Construtor
	 *
	 * @param Action $action
	 * @param string $identify
	 */
	public function __construct( Action $action, $identify ) {
		$this->setAction($action);
		$this->setIdentify($identify);
	}

	/**
	 * Obtem identifica��o
	 *
	 * @return string
	 */
	public function getIdentify() {
		return $this->identify;
	}

	/**
	 * Atribui identifica��o
	 *
	 * @param string $identify
	 */
	public function setIdentify( $identify ) {
		$this->identify = $identify;
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

}
?>