<?php
namespace PHPBootstrap\Render\Html5;

use PHPBootstrap\Render\Context;
use PHPBootstrap\Render\Renderer;
use PHPBootstrap\Widget\Component;

/**
 * Renderizador de componentes
 */
class RendererComponent extends Renderer {
	
	/**
	 * 
	 * @see Renderer::render()
	 */
	public function render( Component $ui, Context $context ){
		$this->toRender($ui->getComponent(), $context);
	}	
}
?>