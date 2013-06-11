<?php
namespace PHPBootstrap\Mvc\Acl;

/**
 * Lista de controle de acesso
 */
class Acl {

	/**
	 * Regras de acesso
	 *
	 * @var array
	 */
	protected $roles;

	/**
	 * Permissão default
	 * 
	 * @var boolean
	 */
	protected $allowed;

	/**
	 * Construtor
	 * 
	 * @param boolean $allowed
	 */
	public function __construct( $allowed ) {
		$this->allowed = ( bool ) $allowed;
		$this->roles = array();
	}

	/**
	 * Permite o acesso de um perfil a um recurso
	 *
	 * @param string|array $role
	 * @param string|array $resource
	 * @param string|array $privilege
	 */
	public function allow( $role = null, $resource = null, $privilege = null ) {
		if ( is_array($role) ) {
			foreach ( $role as $item ) {
				$this->allow($item, $resource, $privilege);
			}
			return;
		}
		if ( is_array($resource) ) {
			foreach ( $resource as $item ) {
				$this->allow($role, $item, $privilege);
			}
			return;
		}
		if ( is_array($privilege) ) {
			foreach ( $privilege as $item ) {
				$this->allow($role, $resource, $item);
			}
			return;
		}
		$role = $role === null ? '*' : $role;
		$resource = $resource === null ? '*' : $resource;
		$privilege = $privilege === null ? '*' : $privilege;
		$this->roles[$role][$resource][$privilege] = true;
	}

	/**
	 * Bloqueia o acesso de um perfil a um recurso
	 *
	 * @param string|array $role
	 * @param string|array $resource
	 * @param string|array $privilege
	 */
	public function deny( $role = null, $resource = null, $privilege = null ) {
		if ( is_array($role) ) {
			foreach ( $role as $item ) {
				$this->deny($item, $resource, $privilege);
			}
			return;
		}
		if ( is_array($resource) ) {
			foreach ( $resource as $item ) {
				$this->deny($role, $item, $privilege);
			}
			return;
		}
		if ( is_array($privilege) ) {
			foreach ( $privilege as $item ) {
				$this->deny($role, $resource, $item);
			}
			return;
		}
		$role = $role === null ? '*' : $role;
		$resource = $resource === null ? '*' : $resource;
		$privilege = $privilege === null ? '*' : $privilege;
		$this->roles[$role][$resource][$privilege] = false;
	}
	
	/**
	 * Revoga uma permissão 
	 * 
	 * @param string|array $role
	 * @param string|array $resource
	 * @param string|array $privilege
	 */
	public function revoke($role = null, $resource = null, $privilege = null ){
		if ( is_array($role) ) {
			foreach ( $role as $item ) {
				$this->revoke($item, $resource, $privilege);
			}
			return;
		}
		if ( is_array($resource) ) {
			foreach ( $resource as $item ) {
				$this->revoke($role, $item, $privilege);
			}
			return;
		}
		if ( is_array($privilege) ) {
			foreach ( $privilege as $item ) {
				$this->revoke($role, $resource, $item);
			}
			return;
		}
		$role = $role === null ? '*' : $role;
		$resource = $resource === null ? '*' : $resource;
		$privilege = $privilege === null ? '*' : $privilege;
		unset($this->roles[$role][$resource][$privilege]);
	}

	/**
	 * Verifica se há permissão de acesso de perfil a um determinado recurso
	 *
	 * @param string $role
	 * @param string $resource
	 * @param string $privilege
	 */
	public function isAllowed( $role, $resource, $privilege = null ) {
		$privilege = $privilege === null ? '*' : $privilege;
		if ( isset($this->roles[$role][$resource][$privilege]) ) {
			return $this->roles[$role][$resource][$privilege];
		} 
		if ( isset($this->roles[$role][$resource]['*']) ) {
			return $this->roles[$role][$resource]['*'];
		} 
		if ( isset($this->roles[$role]['*'][$privilege]) ) {
			return $this->roles[$role]['*'][$privilege];
		}
		if ( isset($this->roles[$role]['*']['*']) ) {
			return $this->roles[$role]['*']['*'];
		}
		if ( isset($this->roles['*'][$resource][$privilege]) ) {
			return $this->roles['*'][$resource][$privilege];
		}
		if ( isset($this->roles['*'][$resource]['*']) ) {
			return $this->roles['*'][$resource]['*'];
		}
		if ( isset($this->roles['*']['*'][$privilege]) ) {
			return $this->roles['*']['*'][$privilege];
		}
		if ( isset($this->roles['*']['*']['*']) ) {
			return $this->roles['*']['*']['*'];
		}
		return $this->allowed;
	}

}
?>