<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Xmlrpc_client extends CI_Controller {

	public function index() {
		echo '<h1>XML-RPC API</h1>';
	}

	private function auth() {
		return array(
			'username' => 'admin',
			'password' => '123',
		);
	}

	public function get() {
		$this->load->helper( 'url' );
		$server_url = 'http://codeigniter.test/xmlrpc_server/';

		$this->load->library( 'xmlrpc' );

		$this->xmlrpc->server( $server_url, 80 );
		$this->xmlrpc->method( 'Get' );

		$request = array(
			array(
				// Param 0: Auth
				$this->auth(),
				'struct'
			),
			array(
				// Param 1: Data
				array(
					'get' => 'username',
				),
				'struct'
			)
		);

		$this->xmlrpc->request( $request );

		if ( ! $this->xmlrpc->send_request() ) {
			echo $this->xmlrpc->display_error();
		} else {
			echo '<pre>';
			print_r( $this->xmlrpc->display_response() );
			echo '</pre>';
		}
	}
}
