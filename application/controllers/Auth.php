<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('username')) {
            redirect($this->session->userdata('role') == 1 ? 'administrator' : 'member');
        }
    }
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
        $username = html_escape($this->input->post('username'));
        $password = html_escape($this->input->post('password'));
        $user = $this->db->get_where('user_details', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'last_name' => $user['last_name']
                ];
                $this->session->set_userdata($data);
                redirect($user['role'] == 1 ? 'administrator' : 'member');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Username / Password anda salah!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Username / Password anda salah!</div>');
            redirect('auth/login');
        }
    }
}
