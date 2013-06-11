<?php
namespace PHPBootstrap\Format;

/**
 * Interface de formatador de data/hora
 */
interface DateFormatter extends Formatter {
	
	/**
	 * Obtem o padr�o do formato
	 *
	 * @return string
	 */
	public function pattern();
	
}
?>