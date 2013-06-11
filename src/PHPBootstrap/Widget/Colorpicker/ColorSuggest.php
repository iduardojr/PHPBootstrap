<?php
namespace PHPBootstrap\Widget\Colorpicker;

use PHPBootstrap\Widget\Form\Controls\Decorator\Suggestible;

/**
 * Sugestão de cor
 */
class ColorSuggest extends AbstractColorPicker implements Suggestible {
	
	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.colorpicker.suggest';
}
?>