<?php
namespace PHPBootstrap\Render;

/**
 * Renderizador
 */
abstract class Renderer {

	/**
	 * Cole��o de renderizadores
	 *
	 * @var RenderKit
	 */
	protected $renderKit;

	/**
	 * Construtor
	 */
	public function __construct() {
		
	}
	
	/**
	 * Atribui cole��o de renderizadores
	 * 
	 * @param RenderKit $renderKit
	 */
	public function setRenderKit( RenderKit $renderKit ){
		$this->renderKit = $renderKit;
	}

	/**
	 * Obtem cole��o de renderizadores
	 *
	 * @return RenderKit
	 */
	public function getRenderKit() {
		return $this->renderKit;
	}

	/**
	 * Renderiza o componente
	 *
	 * @param Render $ui
	 * @param Context $context
	 */
	public function render( Render $ui, Context $context ) {
		
	}

	/**
	 * Atalho para renderizar um componente
	 * 
	 * @param Render $ui
	 * @param Context $context
	 * @throws \RuntimeException
	 */
	protected function toRender( Render $ui, Context $context ) {
		if ( empty($this->renderKit) ) {
			throw new \RuntimeException('not has instance of PHPBootstrap\Render\RenderKit');
		}
		$this->getRenderKit()->getRenderer($ui)->render($ui, $context);
	}
	
}
?>