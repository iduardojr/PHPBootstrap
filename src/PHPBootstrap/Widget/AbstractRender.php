<?php
namespace PHPBootstrap\Widget;

use PHPBootstrap\Render\Render;

/**
 * Interface de Objeto renderizavel
 */
abstract class AbstractRender implements Render {
	
	/**
	 *
	 * @see Render::getRendererType()
	 */
	public function getRendererType() {
		return constant(get_class($this) . '::RendererType');
	}
}
?>