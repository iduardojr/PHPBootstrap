<?php
namespace PHPBootstrap\Common;

/**
 * Carregador automatico das Classes
 */
class ClassLoader {
	
	/**
	 * Construtor
	 */
	public function __construct() {
		
	}
	
	/**
	 * Carrega uma classe do PHPBootstrap
	 * 
	 * @param string $className
	 */
	public function loadClass( $className ) {
		require_once( str_replace('\\', DIRECTORY_SEPARATOR, $className)  . '.php');
	}
	
	/**
	 * Registra o proprio objeto
	 */
	public function registerAutoLoad() {
		self::register(array(&$this, 'loadClass'));
	}
	
	/**
	 * Registra uma funчуo para carregamento automatico
	 *
	 * @param callback $callback
	 * @return boolean
	 */
	public static function register( $callback ) {
		return spl_autoload_register($callback);
	}
	
	/**
	 * Atribui um conjunto de paths
	 *
	 * @param array $path
	 */
	public static function setIncludePaths( array $path) {
		$path = array_merge(explode(PATH_SEPARATOR, get_include_path()), $path);
		set_include_path(implode(PATH_SEPARATOR, $path));
	}

}
?>