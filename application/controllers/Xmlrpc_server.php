<?php

class Xmlrpc_server extends CI_Controller
{

    public function index()
    {
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');

        $config['functions']['Greetings'] = array(
            'function' => 'Xmlrpc_server.process'
        );

        $this->xmlrpcs->initialize($config);
        $this->xmlrpcs->serve();
    }


    public function process($request)
    {

        $username = 'admin';
        $password = '123';

        $parameters = $request->output_parameters();
//        $name = $parameters[0]['name'];
//        $size = $parameters[1]['size'];

        if ($parameters[0]['username'] != $username || $parameters[0]['password'] != $password) {
            return $this->xmlrpc->send_error_message('100', 'Invalid Access');
        }

        $response = array(
            array(
                'you_said' => 'Test',
                'i_respond' => 'Not bad at all.'
            ),
            'struct'
        );

        return $this->xmlrpc->send_response($response);

    }
}