<?php
namespace PHPBootstrap\Widget\Layout;

use PHPBootstrap\Widget\AbstractWidget;
use PHPBootstrap\Widget\Widget;

/**
 * Painel
 */
class Panel extends AbstractWidget {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.layout.panel';

	/**
	 * Conteudo
	 * 
	 * @var string|Widget
	 */
	protected $content;

	/**
	 * Construtor
	 * 
	 * @param string|Widget $content
	 * @param string $name
	 */
	public function __construct( $content, $name = null ) {
		$this->setContent($content);
		$this->setName($name);
	}

	/**
	 * Obtem conteudo
	 * 
	 * @return string|Widget
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Atribui o conteudo
	 * 
	 * @param string|Widget $content
	 */
	public function setContent( $content ) {
		if ( !( $content instanceof Widget || is_scalar($content) || is_null($content) || is_callable(array(&$content, '__toString' )) ) ) {
			throw new \InvalidArgumentException('Content not is instance of PHPBootstrat/Widget/Widget or type string');
		}
		if ( $content instanceof Widget ) {
			$content->setParent($this);
		}
		$this->content = $content;
	}
}
?>