<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Home extends CI_Controller {

	/**
	 * Home constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library( 'parser' );
	}

	public function index() {
		$data = array(
			'site_title'    => 'Website titel',
		);

		$this->load->view('templates/header');
		$this->parser->parse( 'templates/navigation', $data );
		$this->load->view( 'pages/home' );
		$this->load->view( 'templates/footer' );
	}
}