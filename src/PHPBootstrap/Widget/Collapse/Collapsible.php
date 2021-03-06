<?php
namespace PHPBootstrap\Widget\Collapse;

use PHPBootstrap\Widget\Widget;

/**
 * Elemento colapsavel
 */
interface Collapsible extends Widget {

	/**
	 * Obtem identificação do elemento colapsavel
	 *
	 * @return string
	 */
	public function getIdentify();
	
}
?>