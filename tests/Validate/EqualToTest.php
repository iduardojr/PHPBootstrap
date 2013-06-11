<?php
use PHPBootstrap\Validate\Required\EqualTo;

require_once 'tests\ValidateTest.php';


/**
 * EqualTo test case.
 */
class EqualToTest extends ValidateTest {

	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new EqualTo(new MockEntry(''));
		$provider[] = array( $w, '', true );
		$provider[] = array( $w, '1', false );
		
		$w = new EqualTo(new MockEntry('1'));
		$provider[] = array( $w, '1', true );
		$provider[] = array( $w, 2, false );
		
		return $provider;
	}

}
?>