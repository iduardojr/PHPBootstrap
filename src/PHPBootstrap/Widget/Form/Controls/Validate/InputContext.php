<?php
namespace PHPBootstrap\Widget\Form\Controls\Validate;

use PHPBootstrap\Validate\Required\Context;

/**
 * Interface de um contexto de controle
 */
interface InputContext extends Context {

	/**
	 * Obtem a identifica��o do contexto
	 * 
	 * @return string
	 */
	public function getContextIdentify();

}
?>