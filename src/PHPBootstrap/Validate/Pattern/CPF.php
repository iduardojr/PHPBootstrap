<?php
namespace PHPBootstrap\Validate\Pattern;

use PHPBootstrap\Validate\AbstractValidate;
use PHPBootstrap\Validate\Patternable;

/**
 * CPF
 */
class CPF extends AbstractValidate implements Patternable {

	/**
	 * Identificação do validação
	 *
	 * @var string
	 */
	const IDENTIFY = 'cpf';
	
	/**
	 *
	 * @see Validate::valid()
	 */
	public function valid( $value ) {
		$pattern = '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/';
		if ( preg_match($pattern, $value) > 0 ) {
			$value = preg_replace('/[^0-9]/', '', $value);
			$dvValue = substr($value, 9, 2);
			for ( $i = 0; $i <= 8; $i++ ) {
				$digit[$i] = substr($value, $i, 1);
			}
			$pos = 10;
			$sum = 0;
			for ( $i = 0; $i <= 8; $i++ ) {
				$sum = $sum + $digit[$i] * $pos;
				$pos = $pos - 1;
			}
			$digit[9] = $sum % 11;
			if ( $digit[9] < 2 ) {
				$digit[9] = 0;
			} else {
				$digit[9] = 11 - $digit[9];
			}
			$pos = 11;
			$sum = 0;
			for ( $i = 0; $i <= 9; $i++ ) {
				$sum = $sum + $digit[$i] * $pos;
				$pos = $pos - 1;
			}
			$digit[10] = $sum % 11;
			if ( $digit[10] < 2 ) {
				$digit[10] = 0;
			} else {
				$digit[10] = 11 - $digit[10];
			}
			$dv = $digit[9] * 10 + $digit[10];
			return $dv == (int) $dvValue;
		}
		return false;
	}
	
	/**
	 * Obtem uma mensagem default
	 *
	 * @return string
	 */
	protected function getDefaultMessage() {
		return 'value "%s" is not CPF valid';
	}

}
?>