<?php

class Product extends CI_Controller {

	public function get( $id ) {
		// API key
		$apiKey = 'CODEX@123';

		// API auth credentials
		$apiUser = "admin";
		$apiPass = "1234";

		// Specify the ID of the user
		$userID = $id;

		// API URL
		$url = 'http://codeigniter.test/api/products/product/' . $userID;

		// Create a new cURL resource
		$ch = curl_init( $url );

		curl_setopt( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array( "X-API-KEY: " . $apiKey ) );
		curl_setopt( $ch, CURLOPT_USERPWD, "$apiUser:$apiPass" );

		$result = curl_exec( $ch );

		if ( curl_errno( $ch ) ) {
			print "Error: " . curl_error( $ch );
		} else {
			// Show me the result
			$result = json_decode( $result, true );

			// Close cURL resource
			curl_close( $ch );

			echo '<pre>';
			var_dump( $result );
			echo '</pre>';
		}
	}

}