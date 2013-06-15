<?php
namespace PHPBootstrap\Widget\Button;

use PHPBootstrap\Widget\Widget;

/**
 * Coleзгo de botхes
 */
interface BtnChain extends Widget {

	/**
	 * Obtem um botгo a partir do nome
	 *
	 * @param string $name
	 * @return Button
	 */
	public function getButtonByName( $name );
}
?>