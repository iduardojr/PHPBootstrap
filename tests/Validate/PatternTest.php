<?php
use PHPBootstrap\Validate\Pattern\Pattern;

require_once 'tests\ValidateTest.php';

/**
 * Pattern test case.
 */
class PatternTest extends ValidateTest {
	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Pattern(Pattern::PhoneBR);
		$provider[] = array( $w, '(62) 8888-333', false );
		$provider[] = array( $w, '62 8888-3333', false );
		$provider[] = array( $w, '(62) 8888-3333', true );
		return $provider;
	}
}
?>