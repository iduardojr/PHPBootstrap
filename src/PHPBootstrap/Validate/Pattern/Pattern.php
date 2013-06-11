<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\Validate;

/**
 * Interface de uma valida��o quanto ao padr�o
 */
abstract class Pattern extends Validate {
	
	/**
	 * Obtem o padr�o
	 *
	 * @return string
	 */
	public function getPattern() {
		return null;
	}
}
?>