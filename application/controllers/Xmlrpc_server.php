<?php

class Xmlrpc_server extends CI_Controller
{

    public function index()
    {
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');

        $config['functions']['Get'] = array(
            'function' => 'Xmlrpc_server.get'
        );

        $this->xmlrpcs->initialize($config);
        $this->xmlrpcs->serve();
    }


    public function get($request) {

        $username = 'admin';
        $password = '123';

        $parameters = $request->output_parameters();
        $get = $parameters[1]['get'];


        if ($parameters[0]['username'] != $username || $parameters[0]['password'] != $password) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }

        $response = array(
            array(
                'you_said' => $get,
                'i_respond' => 'Not bad at all.'
            ),
            'struct'
        );

        return $this->xmlrpc->send_response($response);

    }
}