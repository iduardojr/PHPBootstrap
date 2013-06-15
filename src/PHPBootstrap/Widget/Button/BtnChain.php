<?php
namespace PHPBootstrap\Widget\Button;

use PHPBootstrap\Widget\Widget;

/**
 * Cole��o de bot�es
 */
interface BtnChain extends Widget {

	/**
	 * Obtem um bot�o a partir do nome
	 *
	 * @param string $name
	 * @return Button
	 */
	public function getButtonByName( $name );
}
?>