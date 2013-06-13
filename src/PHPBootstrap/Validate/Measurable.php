<?php
namespace PHPBootstrap\Validate;

use PHPBootstrap\Validate\Measure\Ruler\Ruler;

/**
 * Interface de um valida��o baseada em mensura��o
 */
interface Measurable extends Validate {
	
	/**
	 * Atribui uma regua
	 *
	 * @param Ruler $ruler
	 */
	public function setRuler( Ruler $ruler = null );
	
	/**
	 * Obtem a reguar
	 *
	 * @return Ruler
	 */
	public function getRuler();
}
?>