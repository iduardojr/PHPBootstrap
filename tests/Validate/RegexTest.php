<?php
use PHPBootstrap\Validate\Pattern\Regex;

require_once 'tests\ValidateTest.php';

/**
 * Regex test case.
 */
class RegexTest extends ValidateTest {
	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Regex(Regex::PATTERN_PHONE_BR);
		$provider[] = array( $w, '(62) 8888-333', false );
		$provider[] = array( $w, '62 8888-3333', false );
		$provider[] = array( $w, '(62) 8888-3333', true );
		return $provider;
	}
}
?>