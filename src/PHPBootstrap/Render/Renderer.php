<?php
namespace PHPBootstrap\Render;

/**
 * Renderizador
 */
abstract class Renderer {

	/**
	 * Coleзгo de renderizadores
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
	 * Atribui coleзгo de renderizadores
	 * 
	 * @param RenderKit $renderKit
	 */
	public function setRenderKit( RenderKit $renderKit ){
		$this->renderKit = $renderKit;
	}

	/**
	 * Obtem coleзгo de renderizadores
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