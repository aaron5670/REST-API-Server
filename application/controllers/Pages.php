<?php

class Pages extends CI_Controller {

	public function view( $slug = null ) {
		$data['news_item'] = $this->news_model->get_news( $slug );

		if ( empty( $data['news_item'] ) ) {
			show_404();
		}

		$data['title'] = $data['news_item']['title'];

		$this->load->view( 'templates/header', $data );
		$this->load->view( 'news/view', $data );
		$this->load->view( 'templates/footer' );
	}
}