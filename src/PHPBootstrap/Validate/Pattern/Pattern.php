<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\Validate;

/**
 * Interface de uma validação quanto ao padrão
 */
abstract class Pattern extends Validate {
	
	/**
	 * Obtem o padrão
	 *
	 * @return string
	 */
	public function getPattern() {
		return null;
	}
}
?>