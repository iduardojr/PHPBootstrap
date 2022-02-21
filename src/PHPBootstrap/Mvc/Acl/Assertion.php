<?php
namespace PHPBootstrap\Mvc\Acl;

/**
 * Interface de uma afirmaчуo
 */
interface Assertion {
	
	/**
	 * Verifica uma afirmaчуo
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