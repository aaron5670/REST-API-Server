<?php

class Xmlrpc_client extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $server_url = site_url('xmlrpc_server');

        $this->load->library('xmlrpc');

        $this->xmlrpc->server($server_url, 80);
        $this->xmlrpc->method('Greetings');

        $request = array(
            array(
                // Param 0
                array(
                    'username' => 'admin',
                    'password' => '123',
                ),
                'struct'
            ),
            array(
                // Param 1
                array(
                    'size' => 'large',
                    'shape' => 'round'
                ),
                'struct'
            )
        );

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
            echo '<pre>';
            print_r($this->xmlrpc->display_response());
            echo '</pre>';
        }
    }
}
