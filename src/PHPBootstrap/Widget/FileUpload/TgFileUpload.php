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
	 * Aчуo
	 *
	 * @var Action
	 */
	protected $action;
	
	/**
	 * Identificaчуo
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
	 * Obtem identificaчуo
	 *
	 * @return string
	 */
	public function getIdentify() {
		return $this->identify;
	}

	/**
	 * Atribui identificaчуo
	 *
	 * @param string $identify
	 */
	public function setIdentify( $identify ) {
		$this->identify = $identify;
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

}
?>