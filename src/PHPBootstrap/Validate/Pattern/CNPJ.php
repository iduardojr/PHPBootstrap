<?php
namespace PHPBootstrap\Validate\Pattern;

/**
 * CNPJ
 */
class CNPJ extends Pattern {

	/**
	 * Identificação do validação
	 *
	 * @var string
	 */
	const IDENTIFY = 'cnpj';
	
	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		$pattern = '/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}-[0-9]{2}$/';
		if ( preg_match($pattern, $value) > 0 ) {
			$value = preg_replace('/[^0-9]/', '', $value);
			for ( $t = 12; $t < 14; $t++ ) {
				for ( $d = 0, $p = $t - 7, $c = 0; $c < $t; $c++ ) {
					$d += $value{$c} * $p;
					$p = ( $p < 3 ) ? 9 : --$p;
				}
				$d = ( ( 10 * $d ) % 11 ) % 10;
				if ( $value{$c} != $d ) {
					return false;
				}
			}
			return true;
		}
		return false;
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not CNPJ valid';
	}

}
?>