<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\Validate;

/**
 * Interface de uma valida��o quanto ao padr�o
 */
abstract class Pattern extends Validate {
	
	/**
	 * @see Validate::getParameter()
	 */
	public function getParameter() {
		return null;
	}
}
?>