<?php
namespace PHPBootstrap\Format;

/**
 * Interface de formatador de data/hora
 */
interface DateFormatter extends Formatter {
	
	/**
	 * Obtem o padrão do formato
	 *
	 * @return string
	 */
	public function pattern();
	
}
?>