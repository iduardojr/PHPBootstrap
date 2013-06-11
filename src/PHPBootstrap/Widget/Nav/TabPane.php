<?php
namespace PHPBootstrap\Widget\Nav;

use PHPBootstrap\Widget\Widget;
use PHPBootstrap\Widget\Containable;
use PHPBootstrap\Widget\AbstractRender;
use PHPBootstrap\Widget\Tab\Tabbable as TabInterface;

/**
 * Painel do tab
 */
class TabPane extends AbstractRender implements TabInterface, Containable {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.nav.tabpane';

	/**
	 * Gera identificaчуo unica
	 *
	 * @var integer
	 */
	protected static $guid = 1;

	/**
	 * Identificaчуo da instancia
	 *
	 * @var integer
	 */
	protected $identity;

	/**
	 * Conteudo
	 *
	 * @var Widget|string
	 */
	protected $content;

	/**
	 * Pai
	 *
	 * @var Tabbable
	 */
	protected $parent;

	/**
	 * Construtor
	 *
	 * @param Widget|string $content
	 */
	public function __construct( $content ) {
		$this->identity = self::$guid++;
		$this->setContent($content);
	}

	/**
	 *
	 * @see Tab::getIdentify()
	 */
	public function getIdentify() {
		return 'tabpane-' . str_repeat('0', 3 - strlen($this->identity)) . $this->identity;
	}

	/**
	 * Obtem o conteudo
	 *
	 * @return Widget|string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Atribui conteudo
	 * 
	 * @param Widget|string $content
	 */
	public function setContent( $content ) {
		if ( ! (is_scalar($content) || $content instanceof Widget) ) {
			throw new \InvalidArgumentException('content not is type string or instance of PHPBootstrap/Widget/Widget');
		}
		if ( $content instanceof Widget ) {
			$content->setParent($this);
		}
		$this->content = $content;
	}

	/**
	 * Obtem pai
	 *
	 * @return Tabbable
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * Atribui pai
	 * 
	 * @param Tabbable $parent
	 */
	public function setParent( Tabbable $parent = null ) {
		$this->parent = $parent;
	}

}
?>