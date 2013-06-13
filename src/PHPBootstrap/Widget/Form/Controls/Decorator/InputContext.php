<?php
namespace PHPBootstrap\Widget\Form\Controls\Decorator;

use PHPBootstrap\Validate\Required\Context;

/**
 * Interface de um contexto de controle
 */
interface InputContext extends Context {

	/**
	 * Obtem a identificaчуo do contexto
	 * 
	 * @return string
	 */
	public function getContextIdentify();

}
?>