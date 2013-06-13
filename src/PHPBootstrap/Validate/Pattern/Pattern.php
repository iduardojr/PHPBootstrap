<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\Validate;

/**
 * Interface de uma validaчуo quanto ao padrуo
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