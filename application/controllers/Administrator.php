<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('username')) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Anda belum login!</div>');
            redirect('auth/login');
        } elseif ($this->session->has_userdata('username') && $this->session->userdata('role') == '0') {
            redirect('welcome/not_authorized');
            die;
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->db->get('user_details')
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/index');
        $this->load->view('administrators/templates/footer');
    }
    public function employees()
    {
        $all_user = $this->db->get('user_details')->result_array();
        $data = [
            'title' => 'Dashboard',
            'user' => $all_user
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/employees', $data);
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
            'password'   => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'first_name' => $this->input->post('first_name'),
            'last_name'  => $this->input->post('last_name'),
            'role'       => $this->input->post('role')
        ];
        $this->db->insert('user_details', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Tambah karyawan baru berhasil!</div>');
        redirect('administrator/employees');
    }
    public function delete()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->db->delete('user_details', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Hapus karyawan berhasil!</div>');
        }
        redirect('administrator/employees');
    }
    public function agenda()
    {
        $all_agenda = $this->db->get_where('agenda_details', ['is_verified' => 'not_verified'])->result_array();
        $data = [
            'title' => 'Dashboard',
            'agenda' => $all_agenda
        ];
        $this->load->view('administrators/templates/header', $data);
        $this->load->view('administrators/templates/topbar');
        $this->load->view('administrators/templates/sidebar');
        $this->load->view('administrators/agenda', $data);
        $this->load->view('administrators/templates/footer');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
