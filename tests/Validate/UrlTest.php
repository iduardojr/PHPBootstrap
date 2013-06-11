<?php
use PHPBootstrap\Validate\Pattern\Url;

require_once 'tests\ValidateTest.php';

/**
 * Url test case.
 */
class UrlTest extends ValidateTest {
	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Url();
		$provider[] = array( $w, 'iduardo', false );
		$provider[] = array( $w, 'www.iduardo@com', false );
		$provider[] = array( $w, 'www.iduardo', false );
		$provider[] = array( $w, 'www.iduardo.com', false );
		$provider[] = array( $w, '127.0.0.1', false );
		$provider[] = array( $w, 'http://iduardo', true );
		$provider[] = array( $w, 'http://iduardo.com', true );
		$provider[] = array( $w, 'http://www.iduardo.com', true );
		$provider[] = array( $w, 'http://127.0.0.1', true );
		$provider[] = array( $w, 'http://127.0.0.1:8080/portal/?page=2&show=%20w', true );
		$provider[] = array( $w, 'https://iduardo', true );
		$provider[] = array( $w, 'ftp://iduardo', true );
		return $provider;
	}
}
?>