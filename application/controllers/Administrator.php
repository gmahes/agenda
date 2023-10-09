<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Anda belum login!</div>');
            redirect('auth/login');
        } elseif ($this->session->userdata('username')) {
            if (!$this->session->userdata('role') == 1) {
                echo "anda tidak bisa mengakses halaman ini";
            }
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/index');
        $this->load->view('administrators/templates/footer');
    }
    public function employees()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/employees');
        $this->load->view('administrators/templates/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user_details.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-2" role="alert">' . validation_errors() . '</div>');
            redirect('administrator/employees');
        }
        $data = [
            'username'   => $this->input->post('username'),
            'password'   => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'role'       => $this->input->post('role')
        ];
        $this->db->insert('user_details', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah karyawan baru berhasil!</div>');
        redirect('administrator/employees');
    }
}
