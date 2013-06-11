<?php
namespace PHPBootstrap\Widget\Timepicker;

use PHPBootstrap\Widget\Form\Controls\Decorator\Suggestible;

/**
 * Sugestão de hora
 */
class TimeSuggest extends AbstractTimePicker implements Suggestible {

	// ID Renderizador
	const RendererType = 'phpbootstrap.widget.timepicker.suggest';
}
?>