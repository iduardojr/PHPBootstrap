<?php
use PHPBootstrap\Validate\Pattern\CNPJ;

require_once 'tests\ValidateTest.php';

/**
 * CNPJ test case.
 */
class CNPJTest extends ValidateTest {
	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new CNPJ();
		$provider[] = array( $w, '09.607.171/0001-51', false );
		$provider[] = array( $w, '09.607.171/0001-58', true );
		return $provider;
	}
}
?>