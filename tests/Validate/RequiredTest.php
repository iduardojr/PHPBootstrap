<?php
use PHPBootstrap\Validate\Required\Context;
use PHPBootstrap\Validate\Required\Required;

require_once 'tests\ValidateTest.php';
class MockContext implements Context {
	public $v;
	public function __construct($v){ $this->v = $v; }
	public function getContextValue() {return $this->v;}
}
/**
 * Required test case.
 */
class RequiredTest extends ValidateTest {

	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = new Required();
		$provider[] = array( $w, '', false );
		$provider[] = array( $w, null, false );
		$provider[] = array( $w, 0, false );
		$provider[] = array( $w, '    ', false );
		$provider[] = array( $w, array(), false );
		$provider[] = array( $w, false, false );
		
		$provider[] = array( $w, '1', true );
		$provider[] = array( $w, true, true );
		$provider[] = array( $w, 1, true );
		$provider[] = array( $w, '0', true );
		$provider[] = array( $w, array( 1 ), true );
		
		$provider[] = array( new Required(new MockContext(false)), false, true );
		$provider[] = array( new Required(new MockContext(true)), false, false );
		
		return $provider;
	}

}
?>