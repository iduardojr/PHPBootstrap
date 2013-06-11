<?php
spl_autoload_register( function( $className ) {
	if ( preg_match('/PHPBootstrap/', $className) ) {
		require_once( 'src\\'. str_replace('\\', DIRECTORY_SEPARATOR, $className)  . '.php');
	}
});
require_once 'mocks.php';
?>