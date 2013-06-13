<?php
use PHPBootstrap\Validate\Pattern\Upload;

require_once 'tests\ValidateTest.php';

/**
 * Upload test case.
 */
class UploadTest extends ValidateTest {

	/**
	 *
	 * @see ValidateTest::provider()
	 */
	public function provider() {
		$w = Upload::Image();
		$provider[] = array( $w, array( 'type' => 'text/html', 'name' => 'image.jpg', 'error' => 0 ), false );
		$provider[] = array( $w, array( 'type' => 'image/jpeg', 'name' => 'image.htm', 'error' => 0 ), false );
		$provider[] = array( $w, array( 'type' => 'image/jpeg', 'name' => 'image.jpg', 'error' => 0 ), true );
		return $provider;
	}

}
?>