<?php
namespace PHPBootstrap\Widget\Action;

/**
 * Roteador em query string
 */
class QueryString implements Router {
	
	/**
	 * Construtor
	 */
	public function __construct() {
		
	}
	
	/**
	 * 
	 * @see URI::toURI()
	 */
	public function toURI( Action $action ) {
		$params['class'] = $action->getClassName();
		if ( $action->getMethodName() ) {
			$params['method'] = $action->getMethodName();
		}
		$params = array_merge($params, $action->getParameters());
		return '?' . urldecode( http_build_query($params) );
	}
}
?>