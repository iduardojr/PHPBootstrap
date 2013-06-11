<?php
namespace PHPBootstrap\Format;

use PHPBootstrap\Widget\Form\Controls\Decorator\MaskMoney;

/**
 * Visitante de um formatador de numero
 */
interface NumberVisitor {

	/**
	 * Visita uma mascara
	 * 
	 * @param MaskMoney $object
	 */
	public function visit( MaskMoney $object );

}
?>