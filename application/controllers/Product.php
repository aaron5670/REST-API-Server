<?php

class Product extends CI_Controller {

	public function get( $id ) {
		// API key
		$apiKey = '81cdafca86929fb7a0376263d35604e932f5ef40';

		// API auth credentials
		$apiUser = "a.vdberg98@gmail.com";  // user email
		$apiPass = "A2ronda2n";             // user password

		// Specify the ID of the user
		$productID = $id;

		// API URL
		$url = 'http://codeigniter.test/api/products/product/' . $productID;

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
			print_r( $result );
			echo '</pre>';
		}
	}

}