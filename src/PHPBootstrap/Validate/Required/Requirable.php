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
	 * Obtem o contexto
	 *
	 * @return Context
	 */
	public function getParameter() {
		return $this->context;
	}
	
}
?>