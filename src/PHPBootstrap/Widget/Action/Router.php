<?php
namespace PHPBootstrap\Widget\Action;

/**
 * Interface de um Roteador
 */
interface Router {

	/**
	 * Gera URI
	 *
	 * @param Action $action
	 * @return string
	 */
	public function toURI( Action $action );

}
?>