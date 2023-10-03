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
    public function create()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
        ];
        $this->db->insert('user_details', $data);
        redirect('auth/login');
    }
}
