<?php
use PHPBootstrap\Validate\Pattern\Email;

require_once 'tests\ValidateTest.php';

/**
 * Email test case.
 */
class EmailTest extends ValidateTest {
	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Email();
		$provider[] = array( $w, 'iduardo', false );
		$provider[] = array( $w, 'iduardo@com', false );
		$provider[] = array( $w, 'iduardo.si@com', false );
		$provider[] = array( $w, 'iduardo_si@com', false );
		$provider[] = array( $w, 'iduardo.si@yahoo.com', true );
		$provider[] = array( $w, 'iduardo.si_1@yahoo.com', true );
		return $provider;
	}
}
?>