<?php
namespace PHPBootstrap\Validate\Required;

use PHPBootstrap\Validate\Validate;

/**
 * Requerivel
 */
abstract class Requirable extends Validate {
	
	/**
	 * Contexto
	 *
	 * @var Context
	 */
	protected $context;
	
	/**
	 * Contexto
	 *
	 * @return Context
	 */
	public function getContext() {
		return $this->context;
	}
	
}
?>