<?php

class Docs extends CI_Controller {

	public function __construct() {
		parent::__construct();

		//Basic site data
		$data = array(
			'site_title' => 'REST-API Website',
		);

		//Load <head>
		$this->load->view( 'templates/head' );
		//Load <nav>
		$this->parser->parse( 'templates/navigation', $data );
	}

	public function index() {

		$code = file_get_contents( asset_url() . '/text/curl_get.txt' );

		$data = array(
			'code' => $code,
		);

		$this->parser->parse( 'pages/documentation', $data );
	}
}