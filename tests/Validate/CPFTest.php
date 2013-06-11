<?php
use PHPBootstrap\Validate\Pattern\CPF;

require_once 'tests\ValidateTest.php';

/**
 * CPF test case.
 */
class CPFTest extends ValidateTest {
	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new CPF();
		$provider[] = array( $w, '004.192.841-51', false );
		$provider[] = array( $w, '004.192.841-50', true );
		return $provider;
	}
}
?>