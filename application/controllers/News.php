<?php

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//$this->load->model( 'news_model' );
		$this->load->model( 'news_model', 'news' );
		$this->load->helper( 'url_helper' );
		$this->load->library( 'parser' );
	}

	public function index() {
		$articles = $this->news->get_news();

		$news_articles = array();
		foreach ( $articles as $article ) {
			$news_articles[] = array(
				'id'    => $article['id'],
				'title' => $article['title'],
				'slug'  => $article['slug'],
				'text'  => $article['text'],
			);
		}

		foreach ( $articles as $article ) {
			$data = array(
				'site_title'    => 'Alle nieuwsberichten',
				'news_articles' => $news_articles,

			);
		}

		$this->parser->parse( 'templates/header', $data );
		$this->parser->parse( 'news/index', $data );
		$this->load->view( 'templates/footer' );
	}

	public function view( $slug = null ) {
		$data['news_item'] = $this->news->get_news( $slug );

		if ( empty( $data['news_item'] ) ) {
			show_404();
		}

		$data = array(
			'title' => $data['news_item']['title'],
			'text'  => $data['news_item']['text'],
		);

//		$data['title'] = $data['news_item']['title'];

		$this->parser->parse( 'news/view', $data );

//		$this->load->view( 'templates/header', $data );
//		$this->load->view( 'news/view', $data );
//		$this->load->view( 'templates/footer' );
	}

	public function create() {
		//Benchmark test start
		$this->benchmark->mark( 'code_start' );

		$this->load->helper( 'form' );
		$this->load->library( 'form_validation' );

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules( 'title', 'Title', 'required' );
		$this->form_validation->set_rules( 'text', 'Text', 'required' );

		if ( $this->form_validation->run() === false ) {
			$this->load->view( 'templates/header', $data );
			$this->load->view( 'news/create' );
			$this->load->view( 'templates/footer' );

		} else {
			$this->news_model->set_news();
			$this->load->view( 'news/success' );

			//Benchmark test end
			$this->benchmark->mark( 'code_end' );
			//print benchmark results
			echo $this->benchmark->elapsed_time( 'code_start', 'code_end' );
		}
	}
}