<?php
namespace PHPBootstrap\Widget\Tab;

use PHPBootstrap\Render\Render;

/**
 * Elemento Tabeavel
 */
interface Tabbable extends Render {

	/**
	 * Obtem identifica��o do elemento tabeavel
	 *
	 * @return string
	 */
	public function getIdentify();
}
?>