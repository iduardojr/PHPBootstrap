<?php
namespace PHPBootstrap\Widget;

/**
 * Interface de um Componente
 */
interface Component extends Widget {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.component';

	/**
	 * Obtem componente
	 *
	 * @return Widget
	 */
	public function getComponent();
}
?>