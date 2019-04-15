<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Home extends CI_Controller {

	/**
	 * Home constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array(
			'site_title'    => 'REST-API Website',
		);

		$this->load->view('templates/head');
		$this->parser->parse( 'templates/navigation', $data );
		$this->load->view('templates/header');
		$this->load->view( 'pages/home' );
		$this->load->view( 'templates/footer' );
	}
}