<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // method menampilkan login page
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            // inisiasi title page
            $data = [
                'title' => 'Login',
            ];
            // memanggil view login.php dan mengirim $data ke login page
            $this->load->view('authentications/login', $data);
        } else {
            // validasi sukses
            $this->verify();
        }
    }
    private function verify()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user_details', ['username' => $username])->row_array();
    }
    public function create()
    {
        $data = [
            'username'   => $this->input->post('username'),
            'password'   => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
        ];
        $this->db->insert('user_details', $data);
    }
}
