<?php
namespace PHPBootstrap\Format;

/**
 * Interface de um parse para data
 */
interface DateParser {

	/**
	 * Converte para outro formato a partir da representa��o em string
	 * 
	 * @param string $value
	 * @return mixed
	 * @throws \InvalidArgumentException
	 */
	public function parse( $value );

}
?>