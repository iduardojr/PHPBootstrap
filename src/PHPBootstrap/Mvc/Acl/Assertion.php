<?php
namespace PHPBootstrap\Mvc\Acl;

/**
 * Interface de uma afirma��o
 */
interface Assertion {
	
	/**
	 * Verifica uma afirma��o
	 *
	 * @param Acl $acl
	 * @param string $role
	 * @param string $resource
	 * @param string $privilege
	 * @return boolean
	 */
	public function assert( Acl $acl, $role, $resource, $privilege );
	
}
?>