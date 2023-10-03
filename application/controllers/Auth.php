<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {

        $data = [
            'title' => 'Login',
        ];
        $this->load->view('authentications/login', $data);
    }
    public function verify()
    {
        $data = $this->input->post($_POST);
        var_dump($data);
        die;
    }
}
