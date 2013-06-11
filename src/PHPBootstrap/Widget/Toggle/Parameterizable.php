<?php
namespace PHPBootstrap\Widget\Toggle;

/**
 * Interface de alternador parametrizavel
 */
interface Parameterizable extends Togglable {
	
	/**
	 * Atribui parametro
	 *
	 * @param string $name
	 * @param string $value
	 */
	public function setParameter( $name, $value );
}
?>