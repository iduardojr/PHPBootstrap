<?php
namespace PHPBootstrap\Widget\Action;

use PHPBootstrap\Common\Enum;
use PHPBootstrap\Widget\Widget;

/**
 * Aчуo de atualizaчуo de conteudo
 */
class TgAjax extends TgLink {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.action.ajax';

	// Formatos de resposta
	const Json = 'json';
	const Html = 'html';
	const Text = 'text';

	/**
	 * Container Alvo
	 *
	 * @var string|Widget
	 */
	protected $target;

	/**
	 * Formato da resposta
	 *
	 * @var string
	 */
	protected $response;

	/**
	 * Construtor
	 * 
	 * @param Action $action
	 * @param string|Widget $target
	 * @param string $response
	 */
	public function __construct( Action $action, $target, $response = null ) {
		parent::__construct($action);
		$this->setTarget($target);
		$this->setResponse($response);
	}

	/**
	 * Obtem container alvo
	 *
	 * @return string|Widget
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * Atribui alvo
	 *
	 * @param string|Widget $target
	 * @throws \InvalidArgumentException
	 */
	public function setTarget( $target ) {
		if ( ! ( is_string($target) || !empty($target) || $target instanceof Widget ) ) {
			throw new \InvalidArgumentException('target not is type string or instance of PHPBootstrap/Widget/');
		}
		$this->target = $target;
	}

	/**
	 * Atribui formato da resposta:
	 * - TgAjax.Json
	 * - TgAjax.Html
	 * - TgAjax.Text
	 *
	 * @param string $response
	 * @throws \UnexpectedValueException
	 */
	public function setResponse( $response ) {
		$this->response = Enum::ensure($response, $this, TgAjax::Html);
	}

	/**
	 * Obtem formato da resposta
	 *
	 * @return string
	 */
	public function getResponse() {
		return $this->response;
	}

}
?>